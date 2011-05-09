<?php
/**
 * Analytic Hyerarchy Process class
 *
 * This class contains all the necessary functions to perform AHP.
 *
 * @version 1.0
 * @author Mihai Zaharie <avataru@gmail.com>
 * @date 9 May 2011
 */
 
// Examples:
// http://en.wikipedia.org/wiki/Analytic_hierarchy_process
// http://en.wikipedia.org/wiki/Talk:Analytic_Hierarchy_Process/Example_Car

class AHP
{
    protected $goal         = '';
    protected $criteria     = array();
    protected $alternatives = array();    

    public function __construct($goal = '')
    {
        $this->goal = $goal;
    }

    public function setGoal($goal)
    {
        $this->goal = $goal;
        return true;
    }

    public function setCriteria($criteria)
    {
        if (is_array($criteria))
        {
            $this->criteria = $criteria;
            return true;
        }
        return false;
    }

    public function setAlternatives($alternatives)
    {
        if (is_array($alternatives))
        {
            $this->alternatives = $alternatives;
            return true;
        }
        return false;
    }

    public function addCriterion($criterion)
    {
        $this->criteria[$criterion] = 0;
        return true;
    }

    public function addAlternative($alternative, $values)
    {
        if (is_array($values))
        {
            $this->alternatives[$alternative] = $values;
            return true;
        }
        return false;
    }
}