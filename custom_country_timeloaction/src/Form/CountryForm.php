<?php  
/**  
 * @file  
 * Contains Drupal\welcome\Form\MessagesForm.  
 */  
namespace Drupal\custom_country_timeloaction\Form;  
use Drupal\Core\Form\ConfigFormBase;  
use Drupal\Core\Form\FormStateInterface;  
  
class CountryForm extends ConfigFormBase {  
   /**  
   * {@inheritdoc}  
   */  
  protected function getEditableConfigNames() {  
    return [  
      'country.adminsettings',  
    ];  
  }  
  
  /**  
   * {@inheritdoc}  
   */  
  public function getFormId() {  
    return 'county_form';  
  }
   /**  
   * {@inheritdoc}  
   */  
  public function buildForm(array $form, FormStateInterface $form_state) {  
    $config = $this->config('country.adminsettings');  
  $country = array('America' => ['America/Chicago' =>'Chicago', 
                                  'America/New_York' => 'New_york'], 
                     'Asia' => ['Asia/Tokyo' => 'Tokyo', 
                                'Asia/Dubai' => 'Dubai', 
                                'Asia/Kolkata' => 'Kolkata'],
                     'Europe' => ['Europe/Amsterdam' => 'Amsterdam', 
                                  'Europe/Oslo' => 'Oslo', 
                                  'Europe/London' => 'London']);
    $form['country'] = [  
      '#type' => 'textfield',  
      '#title' => $this->t('Enter Country Name'),  
      '#description' => $this->t('You Can Enter Country Name to display timezone'),  
      '#default_value' => $config->get('country'),  
    ];
    $form['city'] = [  
      '#type' => 'textfield',  
      '#title' => $this->t('Enter City Name'),  
      '#description' => $this->t('You Can Enter City Name to display timezone'),  
      '#default_value' => $config->get('city'),  
    ]; 
    $form['country_select'] = [
    '#type' => 'select',
    '#title' => $this->t('Select country element to display time'),
    '#options' => $country,
    '#default_value' => $config->get('country_select'),  
    ];
    return parent::buildForm($form, $form_state);  
  }
    /**  
   * {@inheritdoc}  
   */  
  public function submitForm(array &$form, FormStateInterface $form_state) {  
    parent::submitForm($form, $form_state);  
  
    $this->config('country.adminsettings')  
      ->set('country', $form_state->getValue('country'))  
      ->set('city', $form_state->getValue('city'))
      ->set('country_select', $form_state->getValue('country_select'))
      ->save();  
  }
} 
  