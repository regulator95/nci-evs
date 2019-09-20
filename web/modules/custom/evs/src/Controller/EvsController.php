<?php
/**
 * @file
 * Contains \Drupal\evs\Controller\EvsController.
 */
namespace Drupal\evs\Controller;
class EvsController {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello, World!'),
    );  
  }
  public function metathesarurus() {
		
	    $build = [];

	    // CSS and JavaScript libraries can be attached to elements in a renderable
	    // array. This way, if the element ends up being rendered and displayed you
	    // know for sure the CSS/JavaScript will also be included. But, if for
	    // some reason the element isn't ever rendered then Drupal can skip the
	    // unnecessary extra files.
	    //
	    // Learn more about attaching CSS and JavaScript libraries with the
	    // #attached property here:
	    // https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Render%21theme.api.php/group/theme_render/#sec_attached
   
	    $build['#attached'] = [
	      'library' => [
	        'evs/metathesaurus.library',
	      ],
	    ];

    $build['#markup'] = $this->getHTML();
    //$build['#markup'] = "Well Hello";
		$build['#cache'] =	['max-age' => 0,];	 //Set cache for 0 seconds.

		return $build;
  }
  public function getHTML() {
	
      //  Load and render a twig template
      $twig = \Drupal::service('twig');
      
      $template = $twig->loadTemplate('modules/custom/evs/templates/metathesaurus-validation.html.twig');
      $response = $template->render([test=>'test']);
    
      return $response;
  }
}