<?php

/**
 * --------------------------------------------------------------------------
 * CodeIgniter Multi Captcha(CIMC) Helper file 
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
/*
     -------------------@ DESCRIPTION : ---------------------------------------------------------------
         Helper Name
         ----------------: ci_multi_captcha
         Task
         ----------------: Shortcut for User friendly
         DESCRIPTION
         ----------------: *This helper use for Fast execution 5 Command

     -------------------@ End :------------------------------------------------------------------------
*/

    /**
    *	This function Shortcut for make JS link.
    *	output :: 
    *            *bibot     :: <script src="%s"></script>
    *            *arcaptcha :: <script src="%s" async defer></script>
    *            *recaptcha :: <script src="%s?hl=%s"></script>
    *            *hcaptcha :: <script src="%s?hl=%s"></script>
    *	
    */
    if (! function_exists('CIMC_JS'))
    {
        function CIMC_JS(string $CaptchaName ='arcaptcha') : string
        {
            return service('MutiCaptchCI')->makeJSLink($CaptchaName);
        }
    }
    
    /**
    *	This function Shortcut for make html tag.
    *	output :: 
    *            *bibot     :: <div class="bibot-captcha" data-sitekey="%s" data-lang="%s" data-callback="%s"></div>
    *            *arcaptcha :: <div class="arcaptcha" data-site-key="%s" data-color="%s" data-lang="%s" data-size="%s" data-theme="%s" data-callback="%s"></div>
    *            *recaptcha :: <div class="g-recaptcha" data-sitekey="%s" data-theme="%s" data-size="%s" data-tabindex="%s" data-callback="%s" data-expired-callback="%s" data-error-callback="%s"></div>
    *            *hcaptcha :: <div class="h-captcha" data-sitekey="%s" data-theme="%s" data-size="%s" data-tabindex="%s" data-callback="%s" data-expired-callback="%s" data-error-callback="%s"></div>
    *	
    */
    if (! function_exists('CIMC_HTML'))
    {
        function CIMC_HTML(array $options = ['captcha_name'=>'arcaptcha']) : string
        {
            return service('MutiCaptchCI')->makeCaptchaHtmlTag($options);
        }
    }
    
    /**
    *	This function Shortcut for get captcha field name
    *	output :: 
    *            *bibot-response
    *            *arcaptcha-token 
    *            *g-recaptcha-response
    *            *h-captcha-response
    */
    if (! function_exists('CIMC_FIELD'))
    {
        function CIMC_FIELD(string $CaptchaListName='arcaptcha')
        {            
            return service('MutiCaptchCI')->getCaptchaFieldName($CaptchaListName);
        }
    }
    /**
    *	This function Shortcut for get rule name.
    *	output :: 
    *            *bibot     
    *            *arcaptcha 
    *            *recaptcha 
    *            *hcaptcha 
    *	
    */
    if (! function_exists('CIMC_RULE'))
    {
        function CIMC_RULE()
        {
            return service('MutiCaptchCI')->getRuleName();
        }
    }
    
    /**
    *	This function Shortcut for showError if hasError in captcha input.
    *	output :: 
    *           * single error  $templates =>>>>> CIMC_ERRORS_SINGLE
    */
    if (! function_exists('CIMC_ERROR'))
    {
        function CIMC_ERROR()
        {
            $validation =  \Config\Services::validation();
            if ($validation->hasError('bibot-response')) {
                // show bibot errore by CIMC_ERRORS_SINGLE templates
                return $validation->showError('bibot-response','CIMC_ERRORS_SINGLE');
            }
            if ($validation->hasError('g-recaptcha-response')) {
                // show recaptcha errore by CIMC_ERRORS_SINGLE templates
                return $validation->showError('g-recaptcha-response','CIMC_ERRORS_SINGLE');
            }
            if ($validation->hasError('h-captcha-response')) {
                // show hcaptcha errore by CIMC_ERRORS_SINGLE templates
                return $validation->showError('h-captcha-response','CIMC_ERRORS_SINGLE');
            }
            if ($validation->hasError('arcaptcha-token')) {
                // show arcaptcha errore by CIMC_ERRORS_SINGLE templates
                return $validation->showError('arcaptcha-token','CIMC_ERRORS_SINGLE');
            }
        }
    }