<?php

namespace Datamweb\CIMC\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Publisher\Publisher;
use Throwable;

/**
 * --------------------------------------------------------------------------
 * CodeIgniter Multi Captcha Command.
 * --------------------------------------------------------------------------
 *
 * @package         CodeIgniter-Multi-Captcha(CIMC)
 * @collection      Best Datamweb Tools CI4(BDT-CI4)
 * @author          @michalsn
 * @modified        Pooya Parsa Dadashi(@datamweb)
 * @link            https://datamweb.ir
 * @github_link     https://github.com/datamweb/CodeIgniter-Multi-Captcha
 * @since           Version 1.0.3-pre-alpha
 * @datepublic      2023-03-29 | 1402/01/09
 * 
 */
class CIMCaptchaPublish extends BaseCommand
{
    protected $group       = 'CIMCaptcha';
    protected $name        = 'cimc:publish';
    protected $description = 'Publish CI Multi Captcha config file into the current application.';

    public function run(array $params): void
    {
        $source = service('autoloader')->getNamespace('Datamweb\\CIMC')[0];

        $publisher = new Publisher($source, APPPATH);

        try {
            $publisher->addPaths([
                'Config/MultiCaptchaCIConfig.php',
            ])->merge(false);
        } catch (Throwable $e) {
            $this->showError($e);

            return;
        }

        foreach ($publisher->getPublished() as $file) {
            $contents = file_get_contents($file);
            $contents = str_replace('namespace Datamweb\\CIMC\\Config', 'namespace Config', $contents);
            $contents = str_replace('use CodeIgniter\\Config\\BaseConfig', 'use Datamweb\\CIMC\\Config\\MultiCaptchaCIConfig as BaseMultiCaptchaCIConfig', $contents);
            $contents = str_replace('class MultiCaptchaCIConfig extends BaseConfig', 'class MultiCaptchaCIConfig extends BaseMultiCaptchaCIConfig', $contents);
            file_put_contents($file, $contents);
        }

        CLI::write(CLI::color('  Published! ', 'green') . 'You can customize the configuration by editing the "app/Config/MultiCaptchaCIConfig.php" file.');
    }
}
