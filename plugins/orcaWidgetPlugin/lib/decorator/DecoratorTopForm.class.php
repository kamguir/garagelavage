<?php

class DecoratorTopForm extends sfWidgetFormSchemaFormatter {
  protected
    $rowFormat = "<span class='filter_decoarator'>%label% %hidden_fields% %field% %help% <span class='error_list'>%error%&nbsp;</span></span>",
    $helpFormat = '%help%',
    $errorRowFormat = "",
    $errorListFormatInARow = "%errors%",
    $errorRowFormatInARow = "%error%",
    $namedErrorRowFormatInARow = "",
    $decoratorFormat = "%content%";
}
