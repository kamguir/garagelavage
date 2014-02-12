<?php
class orcaWidgeFormFileuploader extends sfWidgetFormInputHidden {

  

  protected function configure($options = array(), $attributes = array())
  {
    
    $this->addRequiredOption('upload_url');
    $this->addOption('download_url');
    $this->addOption('delete_url');
    $this->addOption('file_name_input');
    $this->addOption('file_path_input');
    $this->addOption('multiple', false);
    
    
    parent::configure($options, $attributes);
    
    $this->setOption('is_hidden', false);
  }
  
  
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $input = parent::render($name, $value, $attributes, $errors);
    $upload_url = sfContext::getInstance()->getController()->genUrl($this->getOption('upload_url'));
    $delete_url = sfContext::getInstance()->getController()->genUrl($this->getOption('delete_url'));
    $file_path_input = $this->getOption('file_path_input');
    $file_name_input = $this->getOption('file_name_input');
    $download_url = sfContext::getInstance()->getController()->genUrl($this->getOption('download_url'));
    $attributes = $this->fixFormId(array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $value), $attributes));
    $uploader_div_id = $attributes['id'].'_file_uploader';
    //if ($delete_url) {
      $delete_function_name = 'delete_'.$uploader_div_id.'_file';
    //}
    $multiple = ($this->getOption('multiple') ? 'true' : 'false');
    $onComplete = '';
    $link_init = '';
    if ($file_name_input && $file_path_input) {
      $onComplete = <<<EOF
      $('#{$file_name_input}').val(responseJSON.file_name);
      $('#{$file_path_input}').val(responseJSON.file_path);
      update_{$uploader_div_id}_download_info();
EOF;
    }
    $link_init = <<<EOF
    function update_{$uploader_div_id}_download_info() {
      $('#{$uploader_div_id}_download_info').html('');
      if ($('#{$file_name_input}').val() != '' &&
          $('#{$file_path_input}').val() != '') {
            var a = $('#{$uploader_div_id}_download_info')[0].appendChild(document.createElement('A'));
              a.innerHTML = $('#{$file_name_input}').val();
              a.href = '{$download_url}?file_path='+$('#{$file_path_input}').val()+'&file_name='+$('#{$file_name_input}').val();
            a = $('#{$uploader_div_id}_download_info')[0].appendChild(document.createElement('A'));
            var img = a.appendChild(document.createElement('IMG'));
            img.src = '/images/delete.png';
            a.href='#';
            $(a).bind({click : function(){{$delete_function_name}('{$file_name_input}', '{$file_path_input}');return false;}});
      } else {
        $('#{$uploader_div_id}_download_info').html('<i>Aucun</i>');
      }
    }
    
    function {$delete_function_name}(file_name_input, file_path_input) {
      if (confirm('Supprimer ce fichier?')) {
        $('#'+file_name_input).val('');
        $('#'+file_path_input).val('');
        update_{$uploader_div_id}_download_info()
      }
    }
    update_{$uploader_div_id}_download_info();
EOF;
    
    
    
   $input  .= <<<EOF
      Fichier Associé :
      <span id="{$uploader_div_id}_download_info">
      </span>
<div id="{$uploader_div_id}">
    <noscript>
        <p>Please enable JavaScript to use file uploader.</p>
        <!-- or put a simple form for upload here -->
    </noscript>
</div>

<script type="text/javascript">
//  console.log('#{$uploader_div_id}');
//  console.log( $('#{$uploader_div_id}')[0]);
  {$link_init}
jQuery(function() {
  var uploader = new qq.FileUploader({
    element: $('#{$uploader_div_id}')[0],
    action: '{$upload_url}',
    failUploadText: 'Echec',
    dragText: 'Glisser/déplacer les fichiers ici pour lancer le téléchargement',
    uploadButtonText: 'Télécharger un fichier',
    cancelButtonText: 'Annuler',
    multiple: {$multiple},

    onSubmit: function(id, fileName){
      console.log('id', id);
      console.log('fileName', fileName);
      },
    onProgress: function(id, fileName, loaded, total){
      console.log('id', id);
      console.log('fileName', fileName);
      console.log('loaded', loaded);
      console.log('total', total);
    },
    onComplete: function(id, fileName, responseJSON){
      console.log('id', id);
      console.log('fileName', fileName);
      console.log('responseJSON', responseJSON);
      {$onComplete}
      var lis = $('.qq-upload-list li', $('#{$uploader_div_id}')[0]);
      var theLI = null;
      for (var i=0; i<lis.length; i++) {
        if (lis[i].qqFileId == id) {
          theLI = lis[i];
          break;
        }
      }
      console.log(theLI);
      insertDeleteButton(theLI);

    },
    onCancel: function(id, fileName){
//      console.log('id', id);
//      console.log('fileName', fileName);
      },
    onError: function(id, fileName, xhr){
//      console.log('id', id);
//      console.log('fileName', fileName);
//      console.log('xhr', xhr);
      },

      debug: true
  });
  console.log(uploader);
});

  function insertDeleteButton(container) {
    var div = document.createElement('div');
    $(div).addClass('delete-upload-result');
    div.innerHTML = '&nbsp;';
    container.insertBefore(div, container.firstChild);
    $(div).button({icons:{primary:'ui-icon-close'}});
    $(div).bind({click: function() {
      $(this.parentNode).hide(1000, function() {this.parentNode.removeChild(this)});
      }
    });
}

</script>
    
    
EOF;
    
    return $input;
  }
}