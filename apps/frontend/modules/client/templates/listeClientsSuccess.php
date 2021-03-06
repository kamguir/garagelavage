<div class="container" style="width: 100%;">
    <h3 style="font-size: 20px; border-bottom: 1px solid #ddd;" >Liste des Clients</h3>
    </br>

    <div class=" entitefiltre fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-corner-tl ui-corner-tr ui-helper-clearfix">
        <form method="POST" action="<?php echo url_for("client/listeClients") ?>">        
            <?php // echo $formFilter ?>        
        </form>
    </div>

    <div>
        <table cellpadding="0" cellspacing="0" border="0" id="listeClients" class="display" style="cursor: pointer;">
            <thead>
                <tr>
                    <!--<th><?php // echo __('CIN') ?></th>-->
                    <th><?php echo __('Nom & Prénom') ?></th>
                    <th><?php echo __('Situation') ?></th>
                    <th><?php echo __('Age') ?></th>
                    <th><?php echo __('Num Tél') ?></th>
                    <th><?php echo __('Adresse') ?></th>
                    <th><?php echo __('Fonction') ?></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
    <div style="clear: both; width: 100%;"></div>

</div>
</br>
<!--<style> th.dpass, td.dpass {display: none;}</style>-->
<script>
    $(document).ready(function() {

        oTable2 = $('#listeClients').dataTable(
                {
                    "sDom": 'R<"H"lfr>t<"F"ip<',
                    "bJQueryUI": true,
                    "aaSorting": [[0, "desc"]],
                    "oLanguage": datatablefr,
                    "bAutoWidth": false,
                    "bProcessing": true,
                    "bServerSide": true,
//            "bStateSave": true,
                    "aoColumnDefs": [
                        {"aTargets": [2], "sClass": "dpass"}
                    ],
                    "sAjaxSource": '<?php echo url_for('client/listeClientsAjax') ?>',
                    "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        if (aData[0] == '<?php echo $sf_user->getAttribute('last_viewed_entite_rrf', 'none'); ?>') {
                            $(nRow).addClass('last_viewed');
                        }
                        return nRow;

                    },
                    "fnServerData": function(sSource, aoData, fnCallback) {


                        $.ajax({"dataType": 'json',
                            "type": "POST",
                            "url": sSource,
                            "data": aoData,
                            "success": function(data) {
                                if (data.iTotalDisplayRecords == 0)
                                {
                                    $('.div_menu_bas').hide();
                                }
                                else
                                {
                                    $('.div_menu_bas').show();
                                }
                                fnCallback(data)
                            }
                        }
                        );
                    }
                });
                
            $("#listeClients .even,#listeClients .odd").live("click",function(){
            window.location = "<?php echo url_for("client/edit?id_client=") ?>"+$(this).attr("id").substring(4);
        });
    });
</script>


        <div>
            <h3 class="page-header">Actions</h3>
            <div>
                <a href="<?php echo url_for('client/new') ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Ajouter Client</a> 
                <a href="<?php echo url_for('client/listeClients') ?>" class="btn btn-primary"><i class="icon-list icon-white"></i>Liste des Clients</a> 
            </div></br>
        </div>