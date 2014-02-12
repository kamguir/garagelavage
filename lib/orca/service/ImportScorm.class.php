<?php
class ImportScorm
{
    private $elementsPile;
    private $itemsPile;
    private $manifestData;
    private $flagTag;

    private $zipFile;
    private $errorMsgs,$okMsgs;
    private $pathToManifest;


    public function get_xml_charset( $xml )
    {
        $regex = '/<\?xml(?:.*?)encoding="([a-zA-Z0-9\-]+)"(?:.*?)\s*\?>/';
        if( preg_match( $regex, $xml, $matches ) )
        {
            return $matches[1];
        }
        else
        {
            return get_conf( 'charset' );
        }
    }



/**
 * Function used by the SAX xml parser when the parser meets a opening tag
 * exemple :
 *          <manifest identifier="samplescorm" version="1.1">
 *      will give
 *          $name == "manifest"
 *          attributes["identifier"] == "samplescorm"
 *          attributes["version"]    == "1.1"
 *
 * @param $parser xml parser created with "xml_parser_create()"
 * @param $name name of the element
 * @param $attributes array with the attributes of the element
 */
    public function startElement($parser,$name,$attributes)
    {
        array_push($this->elementsPile,$name);

        switch ($name)
        {
            case "MANIFEST" :
                if (isset($attributes['XML:BASE'])) $this->manifestData['xml:base']['manifest'] = $attributes['XML:BASE'];
                break;
            case "RESOURCES" :
                if (isset($attributes['XML:BASE'])) $this->manifestData['xml:base']['resources'] = $attributes['XML:BASE'];
                $this->flagTag['type'] = "resources";
                break;
            case "RESOURCE" :
                if ( isset($attributes['ADLCP:SCORMTYPE']) && $attributes['ADLCP:SCORMTYPE'] == 'sco' )
                {
                    if (isset($attributes['HREF'])) $this->manifestData['scos'][$attributes['IDENTIFIER']]['href'] = $attributes['HREF'];
                    if (isset($attributes['XML:BASE'])) $this->manifestData['scos'][$attributes['IDENTIFIER']]['xml:base'] = $attributes['XML:BASE'];
                    $this->flagTag['type'] = "sco";
                    $this->flagTag['value'] = $attributes['IDENTIFIER'];
                }
                elseif(isset($attributes['ADLCP:SCORMTYPE'])&& $attributes['ADLCP:SCORMTYPE'] == 'asset' )
                {
                    if (isset($attributes['HREF']))     $this->manifestData['assets'][$attributes['IDENTIFIER']]['href'] = $attributes['HREF'];
                    if (isset($attributes['XML:BASE'])) $this->manifestData['assets'][$attributes['IDENTIFIER']]['xml:base'] = $attributes['XML:BASE'];
                    $this->flagTag['type'] = "asset";
                    if (isset($attributes['IDENTIFIER'])) $this->flagTag['value'] = $attributes['IDENTIFIER'];
                }
                else // check in $this->manifestData['items'] if this ressource identifier is used
                {
                    foreach ($this->manifestData['items'] as $itemToCheck )
                    {
                        if ( isset($itemToCheck['identifierref']) && $itemToCheck['identifierref'] == $attributes['IDENTIFIER'] )
                        {
                            if (isset($attributes['HREF'])) $this->manifestData['scos'][$attributes['IDENTIFIER']]['href'] = $attributes['HREF'];

                            if (isset($attributes['XML:BASE'])) $this->manifestData['scos'][$attributes['IDENTIFIER']]['xml:base'] = $attributes['XML:BASE'];
                        }
                    }
                }
                break;

            case "ITEM" :
                if (isset($attributes['IDENTIFIER']))
                {
                       $this->manifestData['items'][$attributes['IDENTIFIER']]['itemIdentifier'] = $attributes['IDENTIFIER'];

                    if (isset($attributes['IDENTIFIERREF'])) $this->manifestData['items'][$attributes['IDENTIFIER']]['identifierref'] = $attributes['IDENTIFIERREF'];
                    if (isset($attributes['PARAMETERS']))    $this->manifestData['items'][$attributes['IDENTIFIER']]['parameters'] = $attributes['PARAMETERS'];
                    if (isset($attributes['ISVISIBLE']))     $this->manifestData['items'][$attributes['IDENTIFIER']]['isvisible'] = $attributes['ISVISIBLE'];

                    if ( count($this->itemsPile) > 0)
                        $this->manifestData['items'][$attributes['IDENTIFIER']]['parent'] = $this->itemsPile[count($this->itemsPile)-1];

                    array_push($this->itemsPile, $attributes['IDENTIFIER']);

                    if ( $this->flagTag['type'] == "item" )
                    {
                        $this->flagTag['deep']++;
                    }
                    else
                    {
                        $this->flagTag['type'] = "item";
                        $this->flagTag['deep'] = 0;
                    }
                    $this->manifestData['items'][$attributes['IDENTIFIER']]['deep'] = $this->flagTag['deep'];
                    $this->flagTag['value'] = $attributes['IDENTIFIER'];
                }
                break;

            case "ORGANIZATIONS" :
                if( isset($attributes['DEFAULT']) ) $this->manifestData['defaultOrganization'] = $attributes['DEFAULT'];
                else                                $this->manifestData['defaultOrganization'] = '';
                break;
            case "ORGANIZATION" :
                $this->flagTag['type'] = "organization";
                $this->flagTag['value'] = $attributes['IDENTIFIER'];
                break;
            case "ADLCP:LOCATION" :
                // when finding this tag we read the specified XML file so the data structure doesn't even
                // 'see' that this is another file
                // for that we remove this element from the pile so it doesn't appear when we compare the
                // pile with the position of an element
                // $poped = array_pop($elementsPile);
                break;

        }


    }

    /**
     * Function used by the SAX xml parser when the parser meets a closing tag
     *
     * @param $parser xml parser created with "xml_parser_create()"
     * @param $name name of the element
     */
    public function endElement($parser,$name)
    {

        switch($name)
        {
            case "ITEM" :
                array_pop($this->itemsPile);
                if ( $this->flagTag['type'] == "item" && $this->flagTag['deep'] > 0 )
                {
                    $this->flagTag['deep']--;
                }
                else
                {
                    $this->flagTag['type'] = "endItem";
                }
                break;
            case "RESOURCES" :
                $this->flagTag['type'] = "endResources";
                break;
            case "RESOURCE" :
                $this->flagTag['type'] = "endResource";
                break;

        }

        array_pop($this->elementsPile);
    }

    /**
     * Function used by the SAX xml parser when the parser meets something that's not a tag
     *
     * @param $parser xml parser created with "xml_parser_create()"
     * @param $data "what is not a tag"
     */
    public function elementData($parser,$data)
    {
        if (!isset($data)) $data="";

        switch ( $this->elementsPile[count($this->elementsPile)-1] )
        {

            case "RESOURCE" :
                //echo "Resource : ".$data;
                break;
            case "TITLE" :
                // $data == '' (empty string) means that title tag contains elements (<langstring> for an exemple), so it's not the title we need
                if( $data != '' )
                {
                    if ( $this->flagTag['type'] == "item" ) // item title check
                    {
                        if (!isset($this->manifestData['items'][$this->flagTag['value']]['title'])) $this->manifestData['items'][$this->flagTag['value']]['title'] = "";
                        $this->manifestData['items'][$this->flagTag['value']]['title'] .= $data;
                    }


                    // get title of package if it was not find in the manifest metadata in the default organization
                    if ( $this->elementsPile[sizeof($this->elementsPile)-2]  == "ORGANIZATION" && $this->flagTag['type'] == "organization" && $this->flagTag['value'] == $this->manifestData['defaultOrganization'])
                    {
                        // if we do not find this title
                        //  - the metadata title has been set as package title
                        //  - if there was nor title for metadata nor for default organization set 'unnamed path'
                        // If we are here it means we have found the title in organization, this is the best to chose
                        if (!isset($this->manifestData['packageTitle'])) $this->manifestData['packageTitle'] = "";
                        $this->manifestData['packageTitle'] .= $data;
                    }
                }
                break;
            case "ADLCP:PREREQUISITES" :
                if( $data != '' )
                {
                    if ( $this->flagTag['type'] == "item" ) // item title check
                    {
                        $this->manifestData['items'][$this->flagTag['value']]['adlcp:prerequisites'] = $data;
                    }
                }
                break;
            case "ADLCP:MASTERYSCORE" :
                if( $data != '' )
                {
                    if ( $this->flagTag['type'] == "item" ) // item title check
                    {
                        $this->manifestData['items'][$this->flagTag['value']]['adlcp:masteryscore'] = $data;
                    }
                }
                break;
            case "DESCRIPTION" :
                if( $data != '' )
                {
                    if( $this->elementsPile[sizeof($this->elementsPile)-2] == "ORGANIZATION" && $this->flagTag['type'] == "organization" && $this->flagTag['value'] == $this->manifestData['defaultOrganization'])
                    {
                       $this->manifestData['packageDesc'] = $data;
                    }
                }
                break;
            case "ITEM" :
                break;

            case "ADLCP:DATAFROMLMS" :
                $this->manifestData['items'][$this->flagTag['value']]['datafromlms'] = $data;
                break;

            // found a link to another XML file, parse it ...
            case "ADLCP:LOCATION" :
                $xml_parser = xml_parser_create();
                xml_set_element_handler($xml_parser, array($this, "startElement"), array($this, "endElement"));
                xml_set_character_data_handler($xml_parser, array($this, "elementData"));

                $file = $data; //url of secondary manifest files is relative to the position of the base imsmanifest.xml

                // we try to extract only the required file
                $unzippingState = $this->zipFile->extract(PCLZIP_OPT_BY_NAME,$this->pathToManifest.$file, PCLZIP_OPT_REMOVE_PATH, $this->pathToManifest);

                if( $unzippingState != 0 && file_exists( $this->pathToManifest.$file ) )
                {
                    array_push ($this->okMsgs, 'Secondary manifest found in zip file : '.$this->pathToManifest.$file );

                    $readData = file_get_contents($this->pathToManifest.$file);

                    if( !xml_parse($xml_parser, $readData) )
                    {
                        // if reading of the xml file in not successfull :
                        // set errorFound, set error msg, break while statement
                        throw new Exception('Error reading a secondary initialisation file : '.$this->pathToManifest.$file) ;
                    }
                }
                else
                {
                    throw new Exception('Cannot find secondary initialisation file in the package.<br /> File not found : '.$this->pathToManifest.$file) ;
                }
                break;

            case "LANGSTRING" :
                switch ( $this->flagTag['type'] )
                {
                    case "item" :
                        // DESCRIPTION
                        // if the langstring tag is a children of a description tag
                        if ( $this->elementsPile[sizeof($this->elementsPile)-2] == "DESCRIPTION" && $this->elementsPile[sizeof($this->elementsPile)-3] == "GENERAL" )
                        {
                            if (!isset($this->manifestData['items'][$this->flagTag['value']]['description'])) $this->manifestData['items'][$this->flagTag['value']]['description'] = "";
                            $this->manifestData['items'][$this->flagTag['value']]['description'] .= $data;
                        }
                        // title found in metadata of an item (only if we haven't already one title for this sco)
                        if( $this->manifestData['items'][$this->flagTag['value']]['title'] == '' || !isset( $this->manifestData['items'][$this->flagTag['value']]['title'] ) )
                        {
                            if ( $this->elementsPile[sizeof($this->elementsPile)-2] == "TITLE" && $this->elementsPile[sizeof($this->elementsPile)-3] == "GENERAL" )
                            {
                                $this->manifestData['items'][$this->flagTag['value']]['title'] .= $data;
                            }
                        }
                        break;
                    case "sco" :
                        // DESCRIPTION
                        // if the langstring tag is a children of a description tag
                        if ( $this->elementsPile[sizeof($this->elementsPile)-2] == "DESCRIPTION" && $this->elementsPile[sizeof($this->elementsPile)-3] == "GENERAL" )
                        {
                            if (isset($this->manifestData['scos'][$this->flagTag['value']]['description'])) $this->manifestData['scos'][$this->flagTag['value']]['description'] .= $data;
                            else
                            $this->manifestData['scos'][$this->flagTag['value']]['description'] = $data;
                        }
                        // title found in metadata of an item (only if we haven't already one title for this sco)
                        if (!isset($this->manifestData['scos'][$this->flagTag['value']]['title']) || $this->manifestData['scos'][$this->flagTag['value']]['title'] == '')
                        {
                            if ( $this->elementsPile[sizeof($this->elementsPile)-2] == "TITLE" && $this->elementsPile[sizeof($this->elementsPile)-3] == "GENERAL" )
                            {
                                $this->manifestData['scos'][$this->flagTag['value']]['title'] = $data;
                            }
                        }
                        break;
                    case "asset" :
                        // DESCRIPTION
                        // if the langstring tag is a children of a description tag
                        if ( $this->elementsPile[sizeof($this->elementsPile)-2] == "DESCRIPTION" && $this->elementsPile[sizeof($this->elementsPile)-3] == "GENERAL" )
                        {
                            if (isset($this->manifestData['assets'][$this->flagTag['value']]['description']))
                            $this->manifestData['assets'][$this->flagTag['value']]['description'] .= $data;
                            else
                            $this->manifestData['assets'][$this->flagTag['value']]['description'] = $data;

                        }
                        // title found in metadata of an item (only if we haven't already one title for this sco)
                        if(!isset( $this->manifestData['assets'][$this->flagTag['value']]['title'] ) || $this->manifestData['assets'][$this->flagTag['value']]['title'] == '')
                        {
                            if ( $this->elementsPile[sizeof($this->elementsPile)-2] == "TITLE" && $this->elementsPile[sizeof($this->elementsPile)-3] == "GENERAL" )
                            {
                                if (isset($this->manifestData['assets'][$this->flagTag['value']]['title']))
                                $this->manifestData['assets'][$this->flagTag['value']]['title'] .= $data;
                                else
                                $this->manifestData['assets'][$this->flagTag['value']]['title'] = $data;
                            }
                        }
                        break;
                    default :
                        // DESCRIPTION
                        $posPackageDesc = array("MANIFEST", "METADATA", "LOM", "GENERAL", "DESCRIPTION");
                        if($this->compareArrays($posPackageDesc,$this->elementsPile))
                        {
                            if (!isset($this->manifestData['packageDesc'])) $this->manifestData['packageDesc'] = "";
                            $this->manifestData['packageDesc'] .= $data;
                        }

                        if (!isset($this->manifestData['packageTitle']) || $this->manifestData['packageTitle'] == '' )
                        {
                            $posPackageTitle = array("MANIFEST", "METADATA","LOM","GENERAL","TITLE");
                            if ($this->compareArrays($posPackageTitle,$this->elementsPile))
                            {
                                $this->manifestData['packageTitle'] = $data;
                            }
                        }
                        break;

                } // end switch ( $this->flagTag['type'] )

                break;

            default :
                break;
        } // end switch ($elementsPile[count($elementsPile)-1] )

    }


    /**
     * This function checks in elementpile if the sequence of markup is the same as in array2Compare
     * Checks if the sequence is the same in the begining of pile.
     * If the sequences are the same then it means that the elementdata is the one we were looking for.
     *
     * @param $array1 list xml markups upper than the requesting markup
     * @return true if arrays are the same, false otherwise
     */
    public function compareArrays($array1, $array2)
    {
        // sizeof(array2) so we do not compare the last tag, this is the one we are in, so we not that already.
        for ($i = 0; $i < sizeof($array2)-1; $i++)
        {
            if ( $array1[$i] != $array2[$i] ) return false;
        }
        return true;
    }

    public function getOkMsgs()
    {
        return $this->okMsgs ;
    }
    
    public function getWarningMsgs()
    {
        return $this->warningMsgs ;
    }

    public function ImportScorm($values, LmsTblModule $module)
    {
        $fileZip = $values['file'];
        $hauteur = $values['hauteur'];
        $largeur = $values['largeur'];
        $fullscreen = $values['fullscreen'];
        // init msg arays
        $this->okMsgs   = array();
        $this->errorMsgs = array();
        $this->warningMsgs = array();
        
        $is_mastery_score = false;

        

        $lpName = 'Unnamed path';
        
        $con = Propel::getConnection();
        
        $con->beginTransaction();

        try
        {
            $lastSeql = LmsTblSequenceQuery::create()->filterByLmsTblModule($module)
                                                     ->orderByBranch(true)
                                                     ->filterBySequenceLevel(1, Criteria::LESS_EQUAL)
                                                     ->findOne();

            //creation nouvelle sequence_id
            $seq = new LmsTblSequence();
            if($lastSeql)
            {
                $seq->insertAsNextSiblingOf($lastSeql);
            }
            else
            {
                $seq->setLmsTblModule($module);
                $seq->makeRoot();
            }
            $seq->setSequenceTypeId(LmsRefSequenceTypeQuery::TYPE_SCORM);
            $seq->setSequenceLib('Scorm');
            $seq->save($con);

            $urlDir = $seq->getSequenceId().'/';
            $courseDir   = sfConfig::get('sf_web_dir').$module->getModulePath().$urlDir.'/';
            

            //gestion zip
            array_push ($this->okMsgs, 'File received : '.$fileZip->getOriginalName());
            $this->zipFile = new pclZip($fileZip->getTempName());
            $is_allowedToUnzip = true ; // default initialisation

            $zipContentArray = $this->zipFile->listContent();

            if ($zipContentArray == 0)
            {
                throw new Exception('Error reading zip file.');
            }

            $this->pathToManifest  = ""; // empty by default because we can expect that the manifest.xml is in the root of zip file
            $this->pathToManifestFound = false;
            $realFileSize = 0;

            foreach($zipContentArray as $thisContent)
            {
                if ( preg_match('/.(php[[:digit:]]?|phtml)$/i', $thisContent['filename']) )
                {
                    throw new Exception('The zip file can not contain .PHP files');
                }

                if ( strtolower(substr($thisContent['filename'], -15)) == "imsmanifest.xml" )
                {
                    // this check exists to find the less deep imsmanifest.xml in the zip if there are several imsmanifest.xml
                    // if this is the first imsmanifest.xml we found OR path to the new manifest found is shorter (less deep)
                    if ( !$this->pathToManifestFound
                         || ( count(explode('/', $thisContent['filename'])) < count(explode('/', $this->pathToManifest."imsmanifest.xml")) )
                       )
                    {
                        $this->pathToManifest = substr($thisContent['filename'],0,-15) ;
                        $this->pathToManifestFound = true;
                    }
                }
                $realFileSize += $thisContent['size'];
            }

            // PHP extraction of zip file using zlib

            // we try to extract the manifest file
            $unzippingState = $this->zipFile->extract( PCLZIP_OPT_BY_NAME, "imsmanifest.xml",
                                                 PCLZIP_OPT_PATH, $courseDir,
                                                 PCLZIP_OPT_REMOVE_PATH, $this->pathToManifest);
            if ( $unzippingState == 0 )
            {
                throw new Exception('Cannot extract manifest from zip file (corrupted file ? ).');
            }

            // find xmlmanifest (must be in root else ==> cancel operation, delete files)

            // parse xml manifest to find :
            // package name - learning path name
            // SCO list
            // start asset path

            $this->elementsPile = array(); // array used to remember where we are in the arborescence of the XML file
            $this->itemsPile = array(); // array used to remember parents items
            // declaration of global arrays used for extracting needed info from manifest for the new modules/SCO
            $this->manifestData = array();   // for global data  of the learning path
            $this->manifestData['items'] = array(); // item tags content (attributes + some child elements data (title for an example)
            $this->manifestData['scos'] = array();  // for path of start asset id of each new module to create

            $xml_parser = xml_parser_create();
            xml_set_element_handler($xml_parser, array($this, "startElement"), array($this, "endElement"));
            xml_set_character_data_handler($xml_parser, array($this, "elementData"));

            // this file has to exist in a SCORM conformant package
            // this file must be in the root the sent zip
            $file = $courseDir."imsmanifest.xml";

            if( file_exists($file) )
            {
                array_push ($this->okMsgs, 'Manifest found in zip file : '.$this->pathToManifest."imsmanifest.xml" );

                $fileContent = file_get_contents($file);
                $data = html_entity_decode(urldecode( $fileContent ), ENT_COMPAT);

                if( !xml_parse($xml_parser, $data) )
                {
                    $error = strtr( 'Debug : %message (error code %code) on line %line and column %column' ,
                                     array( '%message' => xml_error_string( xml_get_error_code($xml_parser) ) ,
                                            '%code' => xml_get_error_code($xml_parser) ,
                                            '%line' => xml_get_current_line_number($xml_parser) ,
                                            '%column' => xml_get_current_column_number($xml_parser) ) );
                    throw new Exception('Error reading <i>manifest</i> file. '.$error);
                }
            }
            else
            {
                throw new Exception('Cannot find <i>manifest</i> file in the package.<br /> File not found : imsmanifest.xml');
            }
            // liberate parser ressources
            xml_parser_free($xml_parser);
            array_push ($this->okMsgs, 'Manifest read.' );

            if ( sizeof($this->manifestData['items']) > 0 )
            {
                // if there is items in manifest we look for sco type resources referenced in idientifierref
                foreach ( $this->manifestData['items'] as $item )
                {
                    if ( !isset($item['identifierref']) || $item['identifierref'] == '') break; // skip if no ressource reference in item (item is probably a chapter head)
                    // find the file in the zip file
                    $scoPathFound = false;

                    for ( $i = 0 ; $i < sizeof($zipContentArray) ; $i++)
                    {
                        if ( isset($zipContentArray[$i]["filename"]) &&
                            ( ( isset($this->manifestData['scos'][$item['identifierref']]['href'] )
                                && $zipContentArray[$i]["filename"] == $this->pathToManifest.$this->manifestData['scos'][$item['identifierref']]['href'])
                             || (isset($this->manifestData['assets'][$item['identifierref']]['href'])
                             && $zipContentArray[$i]["filename"] == $this->pathToManifest.$this->manifestData['assets'][$item['identifierref']]['href'])
                            )
                           )
                        {
                            $scoPathFound = true;
                            break;
                        }
                    }

                    if ( !$scoPathFound )
                    {
                        throw new Exception('Asset not found : '.$this->manifestData['scos'][$item['identifierref']]['href']);
                    }

                }
            } //if (sizeof ...)
            elseif( sizeof($this->manifestData['scos']) > 0 )
            {
                // if there ie no items in the manifest file
                // check for scos in resources

                foreach ( $this->manifestData['scos'] as $sco )
                {
                    // find the file in the zip file

                    // create a fake item so that the rest of the procedure (add infos of in db) can remains the same
                    $this->manifestData['items'][$sco['href']]['identifierref'] = $sco['href'];
                    $this->manifestData['items'][$sco['href']]['parameters'] = '';
                    $this->manifestData['items'][$sco['href']]['isvisible'] = "true";
                    $this->manifestData['items'][$sco['href']]['title'] =  claro_utf8_decode( $sco['title'] );
                    $this->manifestData['items'][$sco['href']]['description'] = claro_utf8_decode( $sco['description'] );
                    $this->manifestData['items'][$attributes['IDENTIFIER']]['parent'] = 0;

                    $scoPathFound = false;

                    for ( $i = 0 ; $i < sizeof($zipContentArray) ; $i++)
                    {
                        if ( $zipContentArray[$i]["filename"] == $sco['href'] )
                        {
                            $scoPathFound = true;
                            break;
                        }
                    }
                    if ( !$scoPathFound )
                    {
                        throw new Exception('Asset not found : %asset', array('%asset' => $sco['href']));
                    }
                }
            } // if sizeof (...�
            else
            {
                throw new Exception('No module in package');
            }

            //unzip
            // PCLZIP_OPT_PATH is the path where files will be extracted ( '' )
            // PLZIP_OPT_REMOVE_PATH suppress a part of the path of the file ( $this->pathToManifest )
            // the result is that the manifest is in th eroot of the path_# directory and all files will have a path related to the root
            $unzippingState = $this->zipFile->extract(PCLZIP_OPT_PATH, $courseDir,PCLZIP_OPT_REMOVE_PATH, $this->pathToManifest);

            // insert informations in DB :
            //        - 1 learning path ( already added because we needed its id to create the package directory )
            //        - n modules
            //        - n asset as start asset of modules

            if( $unzippingState == 0 )
            {
                throw new Exception('Cannot extract files.');
            }
            elseif ( sizeof( $this->manifestData['items'] ) == 0 )
            {
                throw new Exception('No module in package');
            }

            //ajout en db
            $i = 0;
            $insertedLPMid = array(); // array of learnPath_module_id && order of related group
            $inRootRank = 1; // default rank for root module (parent == 0)

            foreach ( $this->manifestData['items'] as $item )
            {
                if ( isset($item['parent']) && isset($insertedLPMid[$item['parent']]) )
                {
                    $parent = $insertedLPMid[$item['parent']]['LPMid'];
                    $rank = $insertedLPMid[$item['parent']]['rank']++;
                }
                else
                {
                    $parent = $seq;
                    $rank = $inRootRank++;
                }

                //-------------------------------------------------------------------------------
                // add chapter head
                //-------------------------------------------------------------------------------

                if( (!isset($item['identifierref']) || $item['identifierref'] == '') && isset($item['title']) && $item['title'] !='')
                {
                    // add title as a module
                    $chapterTitle = $item['title'];

                    $sequenceScorm = new LmsTblSequence();
                    $sequenceScorm->insertAsLastChildOf($parent);
                    $sequenceScorm->setSequenceLib($chapterTitle);
                    $sequenceScorm->setSequenceTypeId(LmsRefSequenceTypeQuery::TYPE_SCORM);
                    $sequenceScorm->save($con);


                    // get the inserted id of the learnPath_module rel to allow 'parent' link in next inserts
                    $insertedLPMid[$item['itemIdentifier']]['LPMid'] = $sequenceScorm;
                    $insertedLPMid[$item['itemIdentifier']]['rank'] = $sequenceScorm->getLevel();


                    array_push ($this->okMsgs, 'Title added : '."<i>".$chapterTitle."</i>" ) ;
                    $i++;
                    continue;
                }

                // use found title of module or use default title
                if ( !isset( $item['title'] ) || $item['title'] == '')
                {
                    $moduleName = 'Unnamed module';
                }
                else
                {
                    $moduleName = $item['title'];
                }

                // set description as comment or default comment
                // look fo description in item description or in sco (resource) description
                // don't remember why I checked for parameters string ... so comment it
                if ( ( !isset( $item['description'] ) || $item['description'] == '' )
                        &&
                               ( !isset($this->manifestData['scos'][$item['identifierref']]['description']) /*|| $this->manifestData['scos'][$item['identifierref']]['parameters'] == ''*/ )
                       )
                {
                    $description = 'Pas de description.';
                }
                else
                {
                    if (  isset( $item['description'] ) && $item['description'] != '' )
                    {
                        $description = $item['description'];
                    }
                    else
                    {
                        $description = $this->manifestData['scos'][$item['identifierref']]['description'];
                    }
                }

                // insert modules and their start asset
                // create new module

                if (!isset($item['datafromlms'])) $item['datafromlms'] = "";

                $sequenceScorm = new LmsTblSequence();
                $sequenceScorm->insertAsLastChildOf($parent);
                $sequenceScorm->setSequenceLib($moduleName);
                $sequenceScorm->setSequenceTypeId(LmsRefSequenceTypeQuery::TYPE_SCORM);
                $sequenceScorm->setSequenceDescription($description);
                $sequenceScorm->setSequenceLaunchData($item['datafromlms']);
                if(isset($item['adlcp:masteryscore']))
                {
                    $sequenceScorm->setSequenceMasteryscore($item['adlcp:masteryscore']);
                    $is_mastery_score = true;
                }
                if(isset($item['adlcp:prerequisites']))
                {
                    $sequencePrerequis = $insertedLPMid[$item['adlcp:prerequisites']]['LPMid'];
                    $sequenceScorm->setLmsTblSequenceRelatedBySequencePrerequisSequenceId($sequencePrerequis);
                }
                else
                {
                    $this->warningMsgs[] = "La séquence ".$moduleName." n'a pas de prérequis.";
                }
                $sequenceScorm->setSequenceWidth($largeur);
                $sequenceScorm->setSequenceHeight($hauteur);
                $sequenceScorm->setSequenceFullscreen($fullscreen);

                //TODO : contenType

                $sequenceScorm->save($con);


                // build asset path
                // a $this->manifestData['scos'][$item['identifierref']] __SHOULD__ not exist if a $this->manifestData['assets'][$item['identifierref']] exists
                // so according to IMS we can say that one is empty if the other is filled, so we concat them without more verification than if the var exists.

                if (!isset($this->manifestData['xml:base']['manifest']))   $this->manifestData['xml:base']['manifest'] = "";
                if (!isset($this->manifestData['xml:base']['ressources'])) $this->manifestData['xml:base']['ressources'] = "";
                if (!isset($this->manifestData['scos'][$item['identifierref']]['href'])) $this->manifestData['scos'][$item['identifierref']]['href'] = "";
                if (!isset($this->manifestData['assets'][$item['identifierref']]['href'])) $this->manifestData['assets'][$item['identifierref']]['href'] = "";
                if (!isset($this->manifestData['scos'][$item['identifierref']]['parameters'])) $this->manifestData['scos'][$item['identifierref']]['parameters'] = "";
                if (!isset($this->manifestData['assets'][$item['identifierref']]['parameters'])) $this->manifestData['assets'][$item['identifierref']]['parameters'] = "";

                $assetPath = $urlDir
                             .$this->manifestData['xml:base']['manifest']
                             .$this->manifestData['xml:base']['ressources']
                             .$this->manifestData['scos'][$item['identifierref']]['href']
                             .$this->manifestData['assets'][$item['identifierref']]['href']
                             .$this->manifestData['scos'][$item['identifierref']]['parameters']
                             .$this->manifestData['assets'][$item['identifierref']]['parameters'];

                // create new asset
                $sequenceScorm->setSequencePath($assetPath);
                $sequenceScorm->save($con);


                // get the inserted id of the learnPath_module rel to allow 'parent' link in next inserts
                $insertedLPMid[$item['itemIdentifier']]['LPMid']  = $sequenceScorm;
                $insertedLPMid[$item['itemIdentifier']]['rank']  = $sequenceScorm->getLevel();

                array_push ($this->okMsgs, 'Module added : '."<i>".$moduleName."</i>" ) ;
                $i++;
            }//foreach

            if ( isset($this->manifestData['packageTitle']) )
            {
                $lpName = $this->manifestData['packageTitle'] ;
            }
            else
            {
                array_push($this->okMsgs, 'warning : Installation cannot find the name of the learning path and has set a default name.  You should change it.' );
            }
            $seq->setSequenceLib($lpName);
            $seq->save();
            
            //si pas de masteryscore warning
            if(!$is_mastery_score)
            {
                $this->warningMsgs[] = "Aucun masteryscore de renseigné.";
            }
            
            $module->majModuleType();
            $module->save();


            $con->commit();
        }
        catch(Exception $e)
        {
            $con->rollback();
            throw $e;
        }

    }

}

?>
