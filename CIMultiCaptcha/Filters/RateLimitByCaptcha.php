<?php

namespace Datamweb\CIMC\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

/**
 * --------------------------------------------------------------------------
 * CodeIgniter Multi Captcha(CIMC) Filters
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

class RateLimitByCaptcha implements FilterInterface
{
    /**
     * Here I mix Throttler and Captcha (CodeIgniter-Multi-Captcha) implementation.
     * to implement rate limiting and CIMC for your application.
     *
     * @param array|null $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        //load MultiCaptchaCIConfig config file
        $CIMCConfig             =       config('MultiCaptchaCIConfig');
            $RateLimitOn        =       $CIMCConfig->rateLimit['rate_limit_on'];
            $NumberOfAction     =       $CIMCConfig->rateLimit['number_of_action'];
            $RefillPeriod       =       $CIMCConfig->rateLimit['refill_period'];
        //load session and throttler
        $throttler              =       Services::throttler();
        $session                =       session();

        //check RateLimitOn is true
        if($RateLimitOn){
            // set current url for redirect after response to chaptch
            $SessionData = [
                'beforeRateLimitURL'  => current_url(),
            ];
            // check for off filter if ratelimite is controller 
            if(!url_is('ratelimit*') && !url_is('RateLimit*')){

                $session->set($SessionData);
                $numberRequestsAllowed=$throttler->check(md5($request->getIPAddress()), $NumberOfAction, $RefillPeriod);
                    if ( $numberRequestsAllowed === false) {
                            return redirect()->route('ratelimit');
                    }
            }else{
                    $session->remove($SessionData['beforeRateLimitURL']);
                }
        }

    }

    /**
     * We don't have anything to do here.
     *
     * @param array|null $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // ...
    }
}