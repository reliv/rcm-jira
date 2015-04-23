<?php

namespace Reliv\RcmJira\Factory;

use Reliv\RcmJira\JiraLogger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class JiraLoggerFactory
 *
 * LongDescHere
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   Reliv\RcmJira
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright ${YEAR} Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class JiraLoggerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $configRoot = $serviceLocator->get('Config');
        $loggerOptions = $configRoot['Reliv\RcmJira']['JiraLoggerOptions'];

        $api = $serviceLocator->get('Reliv\RcmJira\Api');

        return new JiraLogger($api, $loggerOptions);
    }
}