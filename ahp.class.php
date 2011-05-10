<?php
/**
 * Analytic Hyerarchy Process class
 *
 * This class contains all the necessary functions to perform AHP.
 *
 * PHP version 5
 *
 * LICENSE: CC BY-NC-SA 3.0
 * http://creativecommons.org/licenses/by-nc-sa/3.0/
 *
 * @version 1.0
 * @link https://github.com/avataru/PHP-AHP
 * @author Mihai Zaharie <mihai@zaharie.ro>
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/   CC BY-NC-SA 3.0
 *
 */

class AHP
{
    /**
     * The goal of the analytic process
     *
     * @var string
     */
    public $goal         = '';
    
    /**
     * The criteria used of the analysis
     *
     * @var array
     */
    public $criteria     = array();
    
    /**
     * The alternatives that are analized
     *
     * @var array
     */
    public $alternatives = array();    

    /**
     *
     */
    public function __construct($goal = '')
    {
        $this->goal = $goal;
    }

    /**
     *
     */
    public function setGoal($goal)
    {
        $this->goal = $goal;
        return true;
    }

    /**
     *
     */
    public function setCriteria($criteria, $parent = null)
    {
        if (is_array($criteria))
        {
            if ($parent != null)
            {
                if (isset($this->criteria[$parent]))
                {
                    $this->criteria[$parent]['subcriteria'] = array();
                }
            }
            else
            {     
                $this->criteria = array();
            }
            
            foreach ($criteria as $criterion)
            {
                if(!$this->addCriterion($criterion, $parent))
                {
                    return false;
                }
            }
            
            return true;
        }
        
        return false;
    }

    /**
     *
     */
    public function setAlternatives($alternatives)
    {
        $this->alternatives = array();
        
        if (is_array($alternatives))
        {
            foreach ($alternatives as $alternative)
            {
                if(!$this->addAlternative($alternative))
                {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    /**
     *
     */
    public function addCriterion($criterion, $parent = null)
    {
        if ($parent != null)
        {
            if (isset($this->criteria[$parent]))
            {
                $this->criteria[$parent]['subcriteria'][$criterion]['priorities'] = array(
                    'local' => 0,
                    'global' => 0
                );
            }
            else
            {
                return false;
            }
        }
        else
        {
            $this->criteria[$criterion]['priorities'] = array(
                'local' => 0,
                'global' => 0
            );
        }
        
        return true;
    }

    /**
     *
     */
    public function addAlternative($alternative)
    {
        $this->alternatives[$alternative] = array();
        return true;
    }

    /**
     * @TODO Show priorities
     */
    public function getHierarchy()
    {
        $hierarchy = '';
        
        if ($this->goal != '')
        {
            $hierarchy .= $this->goal;
        }
        
        if (count($this->criteria) > 0)
        {
            $criteria = array_keys($this->criteria);
            foreach ($criteria as $criterion)
            {
                $hierarchy .= "\n|\n";
                $hierarchy .= ($criterion == end($criteria)) ? '\\' : '|';
                $hierarchy .= '---- ' . $criterion;
                
                $subcriteriaData = &$this->criteria[$criterion]['subcriteria'];
                if (isset($subcriteriaData) && count($subcriteriaData) > 0)
                {
                    $subcriteria = array_keys($subcriteriaData);
                    foreach ($subcriteria as $subcriterion)
                    {
                        $hierarchy .= ($criterion == end($criteria)) ? "\n      |\n      " : "\n|     |\n|     ";
                        $hierarchy .= ($subcriterion == end($subcriteria)) ? '\\' : '|';
                        $hierarchy .= '---- ' . $subcriterion;
                    }
                }
            }
        }
        
        return $hierarchy;
    }
    
    /**
     *
     */
    public function getPriorityMatrix($criterion = null)
    {
        $matrix = array();
        
        $criteria = ($criterion != null) ? array_keys($this->criteria[$criterion]['subcriteria']) : array_keys($this->criteria);
        
        foreach ($criteria as $criterionRow)
        {
            foreach ($criteria as $criterionColumn)
            {
                if ($criterionRow != $criterionColumn)
                {
                    if (!isset($matrix[$criterionColumn][$criterionRow]))
                    {
                        $matrix[$criterionRow][$criterionColumn] = 0;
                    }
                }
            }
        }
        
        return $matrix;
    }
    
    /*******/

    /**
     *
     */
    public function getCriteria() {}

    /**
     *
     */
    public function getAlternatives() {}

    /**
     *
     */
    public function removeCriterion() {}

    /**
     *
     */
    public function removeAlternative() {}

    /**
     *
     */
    public function getResults() {}
}