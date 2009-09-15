<?php
/*
 * @version $Id$
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2009 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 --------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file: Walid Nouh
// Purpose of file:
// ----------------------------------------------------------------------
if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access directly to this file");
}


class SoftwareCategoriesRuleCollection extends RuleCollection {

   /**
    * Constructor
   **/
   function __construct() {
      $this->sub_type = RULE_SOFTWARE_CATEGORY;
      $this->rule_class_name = 'SoftwareCategoriesRule';
      $this->stop_on_first_match=true;
      $this->right="rule_softwarescategories";
   }

   function getTitle() {
      global $LANG;

      return $LANG['rulesengine'][37];
   }

   /**
    * Get the attributes needed for processing the rules
    * @param $input input data
    * @param $software software data array
    * @return an array of attributes
    */
   function prepareInputDataForProcess($input,$software) {

      $params["name"]=$software["name"];
      if (isset($software["comment"])) {
         $params["comment"]=$software["comment"];
      }
      if (isset($software["manufacturers_id"])) {
         $params["manufacturer"]=getDropdownName("glpi_manufacturers",$software["manufacturers_id"]);
      }
      return $params;
   }

}


/**
* Rule class store all informations about a GLPI rule :
*   - description
*   - criterias
*   - actions
*
**/
class SoftwareCategoriesRule extends Rule {

   /**
    * Constructor
   **/
   function __construct() {
      parent::__construct(RULE_SOFTWARE_CATEGORY);

      $this->right="rule_softwarescategories";
      $this->can_sort=true;
   }

   function getTitle() {
      global $LANG;

      return $LANG['rulesengine'][37];
   }

   function maxActionsCount() {
      return 1;
   }

}

?>
