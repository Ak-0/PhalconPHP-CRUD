<?php
class PollController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->assets->addJs("js/jquery.js");

        $this->view->polls = Polls::find();
    }


    public function newAction(){
        $poll = new Polls();
        $question = $this->request->get('question');
        $poll->question = $question;
        $poll->create();
        header("Refresh:0;url=../poll/#");

    }

    public function deleteAction(){
        $id = $this->dispatcher->getParam('id');

        if(!$id){
            echo 'id for delete not found';
        }

        else {
            $poll = new Polls();
            $poll = Polls::findFirst("id = ".$id);
            $poll->delete();
            echo 'delete of id '. $id;
        }
    }

    public function editAction($action, $id, $question){
        $id = $this->dispatcher->getParam('id');
        $question = $this->request->get('question');
        if(!$id){
            echo 'id for edit not found';
            return;
        }
        if(!$question){
            echo 'question for edit not found';
            return;
        }
        else {
            $poll = new Polls();
            // Updating a poll completion
            $poll = Polls::findFirst("id = ".$id);
            $poll->question = $question;
            $poll->update();
            echo 'edit of id '. $id;

        }
    }

    public function markAction($id){
        $id = $this->dispatcher->getParam('id');
        if(!$id){
            echo 'id for complete not found';
        }

        else {
            $poll = new Polls();
            // Updating a poll completion
            $poll = Polls::findFirst("id = ".$id);
            $poll->completed = 1;
            $poll->update();
            echo 'complete of id '. $id .' successfull.';
        }
    }
}

