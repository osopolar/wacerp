<?php

class DataExportForm extends sfForm {
    public function configure() {
        $this->setWidgets(array(
            'dataExportFormat' => new sfWidgetFormChoice(array(
                'choices' => $this->getOption('ds'),
                'multiple' => false,
                'expanded' => true,
            )),
        ));
    }

}

?>
