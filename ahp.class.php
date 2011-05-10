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
 */

class AHP
{
    /**
     * The goal of the analytic process
     *
     * @var string
     */
    protected $goal         = '';
    
    /**
     * The criteria used of the analysis
     *
     * Can contain multiple levels of criteria, for example:
     *   $criteria = array(
     *      'Criterion 1' => array(
     *          'priority' => 0.30
     *      ),
     *      'Criterion 2' => array(
     *          'priority' => 0.50,
     *          'subcriteria' => array(
     *              'Criterion 2.1' => array(
     *                  'priority' => 0.15
     *              ),
     *              'Criterion 2.2' => array(
     *                  'priority' => 0.35
     *              )
     *          )
     *      ),
     *      'Criterion 3' => array(
     *          'priority' => 0.20
     *      )
     *   );
     *
     * @var array
     */
    protected $criteria     = array();
    
    /**
     * The alternatives that are analized
     *
     * @var array
     */
    protected $alternatives = array();    

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
    public function setCriteria($criteria)
    {
        if (is_array($criteria))
        {
            $this->criteria = $criteria;
            return true;
        }
        return false;
    }

    /**
     *
     */
    public function setAlternatives($alternatives)
    {
        if (is_array($alternatives))
        {
            $this->alternatives = $alternatives;
            return true;
        }
        return false;
    }

    /**
     *
     */
    public function addCriterion($criterion)
    {
        $this->criteria[$criterion] = 0;
        return true;
    }

    /**
     *
     */
    public function addAlternative($alternative, $values)
    {
        if (is_array($values))
        {
            $this->alternatives[$alternative] = $values;
            return true;
        }
        return false;
    }

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
    public function normalizePriorities() {}

    /**
     *
     */
    public function getResults() {}
}