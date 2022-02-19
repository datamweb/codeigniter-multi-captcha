<?php

/**
 * --------------------------------------------------------------------------
 * CodeIgniter Multi Captcha Helper file 
 * --------------------------------------------------------------------------
 *
 * @package         CodeIgniter-Multi-Captcha(CIMC)
 * @collection      Best Datamweb Tools CI4(BDT-CI4)
 * @author          Pooya Parsa Dadashi(@datamweb)
 * @link            https://datamweb.ir
 * @github_link     https://github.com/datamweb/CodeIgniter-Multi-Captcha
 * @since           Version 1.0.0
 * @datepublic      2022-02-19 | 1400/11/30
 * 
 */

/*
-------------------@ DESCRIPTION : ---------------------------------------------------------------
    Helper Name
    ----------------: cimc_arcaptcha
    Task
    ----------------: Help CIMC for analysis errores from arcaptcha api response
    DESCRIPTION
    ----------------:  
                    * This function was created due to the lack of technical documentation in case of error return from Web Service Arcaptcha.
                    * Arcaptcha has not provided a documentary in this section.(https://docs.arcaptcha.ir/docs/API/Verify)
                    * I manually converted the answer to a hash(md5) and a personal test and make hash code for every error.
                    * I sent a support request, but no response was received.
                    * This function will not be needed if documents (https://docs.arcaptcha.ir/docs/API/Verify) are changed.
                    * BUG::There is also a bug. When the wrong site key is sent, the answer is returned as {"success": true}, if it should be returned as{"status": 401,"message": "Wrong site key"}. This is a bug in Arcaptcha API and I lost it.
-------------------@ End :------------------------------------------------------------------------
*/
if (! function_exists('analysisErrorsArcaptcha'))
{
    function analysisErrorsArcaptcha(string $response_body) : string
    {
        switch (md5($response_body)) {
            // for Content-Type missing
            case 'c41a6ccb441572436e21f89cf98e183d':
                return 'missing_content_type';
            //missing_challenge_id
            case 'de9ea582f07e54a8ffdd25e9a04554fc':
                return 'missing_challenge_id';
            //missing_site_key
            case '47177ff4c11a7deca444d9bcad0ba027':
                return 'missing_site_key';
            //missing_secret_key
            case '38f5b33c1f42d20c5d4f0ff68d77973a':
                return 'missing_secret_key';
            //missing_all_body_input
            case '310aad2260fc1737f0d0ab7fee782d59':
                return 'missing_all_body_input';
            //invalid_input_response
            case 'f797d977f3010cf9a70d485616cac632':
                return 'invalid_input_response';
            // BUG :: in arcaptcha site_key is required but if it is not correct, return {"success": true}
            //invalid_site_key
            case 'c42a5d9b4b35d2a424b1419cde294bb2':
                return 'invalid_site_key';
            //invalid_secret_key
            case '7164070f986960e65fd3eff472494a72':
                return 'invalid_secret_key';
            default:
                return lang('MultiCaptchaCILang.ArCaptcha.errors.unknownERRORS');
        }
    }
}