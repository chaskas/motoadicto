<?php

class sfWidgetFormSchemaFormatterSpan extends sfWidgetFormSchemaFormatter {

  protected
  $rowFormat = '<div style="padding-bottom: 10px;height: 20px;">
                  <div style="width: 150px;float: left;">
                    %label% 
                  </div>
                  <div style="width: 300px; float: left">
                    %field% %error% <br />%help%
                  </div>
                  <div style="clear: both"></div>
                </div>',
  $helpFormat = '<span class="help">%help%</span>',
  $errorRowFormat = '<div>%errors%</div>',
  $errorListFormatInARow = '%errors%',
  $errorRowFormatInARow = '<h6 style="margin-top: 22px;"><strong style="color: red">&nbsp; %error%</strong></h6>',
  $namedErrorRowFormatInARow = '%name%: %error%',
  $decoratorFormat = '<div id="formContainer">%content%</div>';

}

?>