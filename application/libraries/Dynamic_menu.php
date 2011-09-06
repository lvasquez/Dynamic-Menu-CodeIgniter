<?php
/*
 * Dynmic_menu.php
 */
class Dynamic_menu {

    private $ci;            // para CodeIgniter Super Global Referencias o variables globales
    private $id_menu        = 'id="menu"';
    private $class_menu        = 'class="menu"';
    private $class_parent    = 'class="parent"';
    private $class_last        = 'class="last"';
    // --------------------------------------------------------------------
    /**
     * PHP5        Constructor
     *
     */
    function __construct()
    {
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
    }
    // --------------------------------------------------------------------

    /**
     * build_menu($table, $type)
     *
     * Description:
     *
     * builds the Dynaminc dropdown menu
     * $table allows for passing in a MySQL table name for different menu tables.
     * $type is for the type of menu to display ie; topmenu, mainmenu, sidebar menu
     * or a footer menu.
     *
     * @param    string    the MySQL database table name.
     * @param    string    the type of menu to display.
     * @return    string    $html_out using CodeIgniter achor tags.
     */
   
	function build_menu($type)
    {
        $menu = array();

	 $query = $this->ci->db->query("select * from dyn_menu"); 

        // now we will build the dynamic menus.
        $html_out  = "\t".'<div '.$this->id_menu.'>'."\n";

        /**
         * check $type for the type of menu to display.
         *
         * ( 0 = top menu ) ( 1 = horizontal ) ( 2 = vertical ) ( 3 = footer menu ).
         */
        switch ($type)
        {
            case 0:            // 0 = top menu
                break;

            case 1:            // 1 = horizontal menu
                $html_out .= "\t\t".'<ul '.$this->class_menu.'>'."\n";
                break;

            case 2:            // 2 = sidebar menu
                break;

            case 3:            // 3 = footer menu
                break;

            default:        // default = horizontal menu
                $html_out .= "\t\t".'<ul '.$this->class_menu.'>'."\n";

                break;
        }
 
    // me despliega del query los rows de la base de datos que deseo utilizar
      foreach ($query->result() as $row)
            {
                $id = $row->id;
                $title = $row->title;
                $link_type = $row->link_type;
                $page_id = $row->page_id;
                $module_name = $row->module_name;
                $url = $row->url;
                $uri = $row->uri;
                $dyn_group_id = $row->dyn_group_id;
                $position = $row->position;
                $target = $row->target;
                $parent_id = $row->parent_id;
                $is_parent = $row->is_parent;
                $show_menu = $row->show_menu;
	
	          {
                if ($show_menu && $parent_id == 0)   // are we allowed to see this menu?

				{
				 
                    if ($is_parent == TRUE)
                    {
                    // CodeIgniter's anchor(uri segments, text, attributes) tag.
         
$html_out .= "\t\t\t".'<li>'.anchor($url.' '.$this->class_parent, '<span>'.$title.'</span>', 'name="'.$title.'" id="'.$id.'" target="'.$target.'"');
                 
					}
                    else
                    {
    $html_out .= "\t\t\t".'<li>'.anchor($url, '<span>'.$title.'</span>', 'name="'.$title.'" id="'.$id.'" target="'.$target.'"');		   
                    }
                       
			   }
          
		 	 }
		   $html_out .= $this->get_childs($id);      
          // print_r($id);		   
		}
		 // loop through and build all the child submenus.
                  
	    $html_out .= '</li>'."\n";
        $html_out .= "\t\t".'</ul>' . "\n";
        $html_out .= "\t".'</div>' . "\n";

        return $html_out;
    }  
	 /**
     * get_childs($menu, $parent_id) - SEE Above Method.
     *
     * Description:
     *
     * Builds all child submenus using a recurse method call.
     *
     * @param    mixed    $id
     * @param    string    $id usuario
     * @return    mixed    $html_out if has subcats else FALSE
     */
    function get_childs($id) 
    { 
		$has_subcats = FALSE;

        $html_out  = '';
        $html_out .= "\n\t\t\t\t".'<div>'."\n";
        $html_out .= "\t\t\t\t\t".'<ul>'."\n";
		
		// query q me ejecuta el submenu filtrando por usuario y para buscar el submenu segun el id que traigo
	     $query = $this->ci->db->query("select * from dyn_menu where parent_id = $id");
		
		 foreach ($query->result() as $row)
            {
                $id = $row->id;
                $title = $row->title;
                $link_type = $row->link_type;
                $page_id = $row->page_id;
                $module_name = $row->module_name;
                $url = $row->url;
                $uri = $row->uri;
                $dyn_group_id = $row->dyn_group_id;
                $position = $row->position;
                $target = $row->target;
                $parent_id = $row->parent_id;
                $is_parent = $row->is_parent;
                $show_menu = $row->show_menu;
			

		        $has_subcats = TRUE;

                if ($is_parent == TRUE)
                {
      $html_out .= "\t\t\t\t\t\t".'<li>'.anchor($url.' '.$this->class_parent, '<span>'.$title.'</span>', 'name="'.$title.'" id="'.$id.'" target="'.$target.'"');
             
				}
                else
                {
                   $html_out .= "\t\t\t\t\t\t".'<li>'.anchor($url, '<span>'.$title.'</span>', 'name="'.$title.'" id="'.$id.'" target="'.$target.'"');
	            }

                // Recurse call to get more child submenus.
                   $html_out .= $this->get_childs($id); 
		}		
	  $html_out .= '</li>' . "\n";
	  $html_out .= "\t\t\t\t\t".'</ul>' . "\n";
      $html_out .= "\t\t\t\t".'</div>' . "\n";

        return ($has_subcats) ? $html_out : FALSE;
	
    }
}

// ------------------------------------------------------------------------
// End of Dynamic_menu Library Class.

// ------------------------------------------------------------------------
/* End of file Dynamic_menu.php */
/* Location: ../application/libraries/Dynamic_menu.php */  