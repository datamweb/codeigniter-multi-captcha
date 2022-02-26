<?php 

namespace CIMC\Controllers;


/**
 * --------------------------------------------------------------------------
 * CodeIgniter Multi Captcha(CIMC) Controller
* --------------------------------------------------------------------------
*
* @package         CodeIgniter-Multi-Captcha(CIMC)
* @collection      Best Datamweb Tools CI4(BDT-CI4)
* @author          Pooya Parsa Dadashi(@datamweb)
* @link            https://datamweb.ir
* @github_link     https://github.com/datamweb/CodeIgniter-Multi-Captcha
* @since           Version 1.0.2-pre-alpha
* @datepublic      2022-02-26 | 1400/12/07
* 
*/

class RateLimit extends \CodeIgniter\Controller
{

  /**
   * Constructor.
   */
  public function __construct()
  {

    //load MultiCaptchaCIConfig config file
    $MultiCaptchaCIConfig = config('MultiCaptchaCIConfig');
                $this->CaptchaName        =       $MultiCaptchaCIConfig->rateLimit['captcha_name'];
                $this->ViewRateLimit      =       $MultiCaptchaCIConfig->rateLimit['rate_limit_view'];

                $this->NumberOfAction     =       $MultiCaptchaCIConfig->rateLimit['number_of_action'];
                $this->RefillPeriod       =       $MultiCaptchaCIConfig->rateLimit['refill_period'];
    //Essentials required
    helper(['ci_multi_captcha','form','url']);
    $this->throttler=service('throttler');
    $this->session=session();
    $this->request = \Config\Services::request();

    //data for render in view
    $this->data=[
    // text view
    'browser_title'              =>  lang('MultiCaptchaCILang.RateLimit.browser_title'),
    'browser_description'        =>  lang('MultiCaptchaCILang.RateLimit.browser_description'),

    'header_title'               =>  lang('MultiCaptchaCILang.RateLimit.header_title'),
    'header_description'         =>  lang('MultiCaptchaCILang.RateLimit.header_description'),
    'form_description'           =>  lang('MultiCaptchaCILang.RateLimit.form_description'),
    
    'submit'                     =>  lang('MultiCaptchaCILang.RateLimit.submit'),

    'title_rate_limit'           =>  lang('MultiCaptchaCILang.RateLimit.title_rate_limit'),
    'learn_rate_limit'           =>  lang('MultiCaptchaCILang.RateLimit.learn_rate_limit'),
    'explain_rate_limit'         =>  lang('MultiCaptchaCILang.RateLimit.explain_rate_limit'),
    // ci getLocale for rtl Diagnosis.
    'getLocale'                  =>  $this->request->getLocale(),
    //setting info from config file
    'captcha_name'               =>  $this->CaptchaName,
    'number_requests'            =>  $this->NumberOfAction,
    'refill_period'              =>  $this->RefillPeriod,
    
    ];

  }

  /**
   * for To display captcha if the above number of requests is activated by a user.
   *
   * @return mixed
   */
  public function index() {
    
    $numberRequestsAllowed=$this->throttler->check(md5($this->request->getIPAddress()), $this->NumberOfAction, $this->RefillPeriod);
    if($numberRequestsAllowed === false){
        if($this->request->getPost('submit')) {
            $rules=[CIMC_FIELD($this->CaptchaName) =>CIMC_RULE()];
            if (! $this->validate($rules))
            {
            //error in captcha
              return view($this->ViewRateLimit,$this->data);
            }
            //not error in user captcha response
            else {
              //Removes & resets the bucket.
              $this->throttler->remove(md5($this->request->getIPAddress()));
              //redirect user to transfer reference
              return redirect()->to($this->session->get('beforeRateLimitURL'));
            }
        } 
        else {
          return view($this->ViewRateLimit,$this->data);
        }
    }else{
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

}




