<?php

/**
 * test actions.
 *
 * @package    WacERP
 * @subpackage test
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class testActions extends WacCommonActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->addActionJs();

        //component js required, begin
//
//        //component css required, begin
//        $this->getResponse()->addStylesheet("apps/backend/console/".__CLASS__.".css", 'last');
//        //component css required, begin

//        $this->setLayout("layout");
    }

    public function executeTestForm(sfWebRequest $request) {
        $this->form = new sfForm();
        $this->form->setWidgets(array(
            'name' => new sfWidgetFormInputText(),
            'email' => new sfWidgetFormInputText(array('default' => 'me@example.com')),
            'subject' => new sfWidgetFormChoice(array('choices' => array('Subject A', 'Subject B', 'Subject C'))),
            'message' => new sfWidgetFormTextarea(),
        ));

//        $this->setLayout("layout");
    }

}
