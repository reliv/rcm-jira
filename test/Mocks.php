<?php

namespace RcmErrorHandler\Test;

use RcmErrorHandler\Model\Config;
use RcmErrorHandler\Model\GenericError;

require_once __DIR__ . '/autoload.php';

/**
 * Class Mocks
 *
 * LongDescHere
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   RcmErrorHandler\Test
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2014 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class Mocks extends \PHPUnit_Framework_TestCase
{
    public function getMockJiraLogger()
    {

        $mock = $this->getMockBuilder(
            '\Reliv\RcmJira\Log\JiraLogger'
        )
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects(
            $this->any()
        )
            ->method('log')
            ->will(
                $this->returnValue($mock)
            );

        return $mock;
    }

    public function getMockJiraApi(
        $mockResultSearch,
        $mockResultAddComment,
        $mockResultCreateIssue
    ) {
        $mock = $this->getMockBuilder(
            '\chobie\Jira\Api'
        )
            ->disableOriginalConstructor()
            ->getMock();

        $mock->expects(
            $this->any()
        )
            ->method('search')
            ->will(
                $this->returnValue($mockResultSearch)
            );

        $mock->expects(
            $this->any()
        )
            ->method('addComment')
            ->will(
                $this->returnValue($mockResultAddComment)
            );

        $mock->expects(
            $this->any()
        )
            ->method('createIssue')
            ->will(
                $this->returnValue($mockResultCreateIssue)
            );


        return $mock;
    }

    public function getMockApiResult($mockApiIssue = null)
    {

        $mockApiIssues = [];
        $issueCnt = 0;
        if ($mockApiIssue) {
            $mockApiIssues = [
                $mockApiIssue
            ];

            $issueCnt = 1;
        }

        $mock = $this->getMockBuilder(
            '\chobie\Jira\Api\Result'
        )
            ->disableOriginalConstructor()
            ->getMock();

        $mock->expects(
            $this->any()
        )
            ->method('getResult')
            ->will(
                $this->returnValue([])
            );

        $mock->expects(
            $this->any()
        )
            ->method('getIssuesCount')
            ->will(
                $this->returnValue($issueCnt)
            );

        $mock->expects(
            $this->any()
        )
            ->method('getIssues')
            ->will(
                $this->returnValue($mockApiIssues)
            );

        return $mock;
    }

    public function getMockApiResultErr()
    {

        $mock = $this->getMockBuilder(
            '\chobie\Jira\Api\Result'
        )
            ->disableOriginalConstructor()
            ->getMock();

        $mock->expects(
            $this->any()
        )
            ->method('getResult')
            ->will(
                $this->returnValue(
                    [
                        'errors' => [],
                        'errorMessages' => [
                            'some',
                            'error'
                        ],
                    ]
                )
            );

        return $mock;
    }

    public function getMockApiIssue()
    {

        $mock = $this->getMockBuilder(
            '\chobie\Jira\Issue'
        )
            ->disableOriginalConstructor()
            ->getMock();

        $mock->expects(
            $this->any()
        )
            ->method('getKey')
            ->will(
                $this->returnValue('TESTREF')
            );

        return $mock;
    }
} 