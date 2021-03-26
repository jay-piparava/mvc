<?php

namespace Controller\Core;

class Pager
{
    protected $totalRecords = null;
    protected $noOfPage = null;
    protected $recordsPerPage = null;
    protected $currentPage = null;
    protected $start = 1;
    protected $next = null;
    protected $previous = null;
    protected $end = null;

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setNext($next)
    {
        $this->next = $next;

        return $this;
    }

    public function getPrevious()
    {
        return $this->previous;
    }

    public function setPrevious($previous)
    {
        $this->previous = $previous;

        return $this;
    }

    public function getTotalRecords()
    {
        return $this->totalRecords;
    }

    public function setTotalRecords($totalRecords)
    {
        $this->totalRecords = $totalRecords;

        return $this;
    }

    public function getRecordsPerPage()
    {
        return $this->recordsPerPage;
    }

    public function setRecordsPerPage($recordsPerPage)
    {
        $this->recordsPerPage = $recordsPerPage;

        return $this;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    public function getNoOfPage()
    {
        return $this->noOfPage;
    }

    public function setNoOfPage($noOfPage)
    {
        $this->noOfPage = $noOfPage;

        return $this;
    }
    public function calculate()
    {
        $this->setNoOfPage(@ceil($this->getTotalRecords() / $this->getRecordsPerPage()));

        if ($this->getTotalRecords() <= $this->getRecordsPerPage()) {
            $this->setStart(1);
            $this->setNext(null);
            $this->setPrevious(null);
            $this->setEnd(null);
            return $this;
        }
        if ($this->getCurrentPage() < $this->getStart()) {
            $this->setCurrentPage($this->getStart());
            $this->setNext($this->getCurrentPage() + 1);
            $this->setEnd($this->getNoOfPage());
            $this->setPrevious(null);
            return $this;
        }
        if ($this->getCurrentPage() > $this->getNoOfPage()) {
            $this->setCurrentPage($this->getNoOfPage());
            $this->setPrevious($this->getCurrentPage() - 1);
            $this->setEnd($this->getNoOfPage());
            $this->setNext(null);
            return $this;
        }

        if ($this->getCurrentPage() == $this->getNoOfPage()) {
            $this->setEnd($this->getNoOfPage());
            $this->setNext(null);
            $this->setStart($this->getStart());
            $this->setPrevious($this->getCurrentPage() - 1);
            return $this;
        }
        if ($this->getCurrentPage() == $this->getStart()) {
            $this->setEnd($this->getNoOfPage());
            $this->setPrevious(null);
            $this->setNext($this->getCurrentPage() + 1);
            return $this;
        }
        if ($this->getcurrentPage() != $this->getNoOfPage() && $this->getCurrentPage() != $this->getStart()) {
            $this->setPrevious($this->getCurrentPage() - 1);
            $this->setNext($this->getCurrentPage() + 1);
            $this->setEnd($this->getNoOfPage());
            return $this;
        }
    }

}
// echo "<pre>";
// $abc = new pager();
// $abc->setTotalRecords(100);
// $abc->setCurrentPage($_GET['page']);
// $abc->calculate();
// print_r($abc);
