<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Chrome\ChromeOptions;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     * https://chromedriver.storage.googleapis.com/index.html?path=2.37/
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        /**
         * This will start Dusk from automatically starting the ChromeDriver:
         * user@root:~$chromdriver //manual-running
         */
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        /**
         * option argument in chrome linux/ubuntu
         * requiretment no sandbox and user-data-dir
         */
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--headless',
            '--whitelisted-ips',
            // linux chrome required
            '--user-data-dir',
            '--no-sandbox',
            '--disable-extensions',
            // ?fullscreen->screenshot->maximize
            '--window-size=1920,1080',
            // '--window-size=(720x1280)',
        ]);
        /**
         * run webDriver on default port 9515
         * set with $option where the option are arguments chrome
         */
        return RemoteWebDriver::create(
            'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY,
                $options
            )
        );
        // return RemoteWebDriver::create(
        //     'http://localhost:9515', DesiredCapabilities::chrome(), 5000, 10000
        // );

    }
}
