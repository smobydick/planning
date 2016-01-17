<?php
/**
* SubjectControllerTest Doc Comment.
*
* PHP version 5.5.9
*
* @author Sainte-Luce Marvin <marvin.sainteluce@gmail.com>
*
* @link   https://github.com/marvin-SL/planning
*/
namespace AppBundle\Tests\Controller;

use PHPUnit_Extensions_Selenium2TestCase;
use AppBundle\Tests\WebTestCase;

/**
 *  test on Subject.
 */
class SubjectControllerTest extends WebTestCase
{

    /**
     * test on index.
     *
     */
    public function testIndex()
    {

        $client = static::createClient();

        $this->login($client, 'marvin.sainteluce', 'cmw');

        $crawler = $client->request('GET', '/admin/subjects/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /admin/subjects");

        $this->assertGreaterThan(0, $crawler->filter('html:contains("Anglais")')->count(), 'Missing element html:contains("Anglais")');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Julian, Trudy")')->count(), 'Missing element html:contains("Julian, Trudy")');
    }

    /**
     * test on createSubject.
     *
     */
    public function testNewSubject()
    {
        $client = static::createClient();

        $this->login($client, 'marvin.sainteluce', 'cmw');

        $crawler = $client->request('GET', '/admin/subjects/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /admin/subjects/");

        $crawler = $client->click($crawler->selectLink('Ajouter')->link());

        $form = $crawler->selectButton('Créer')->form(array(
            'name' => 'subject',
            'teachers' => '3',
            'color' => '#e69138'
        ));

        $client->submit($form);

        $crawler = $client->followRedirect();

    }

    /**
     * test on edit Subject.
     *
     */
    public function testEditSubject()
    {
        $client = static::createClient();

        $this->login($client, 'marvin.sainteluce', 'cmw');

        $crawler = $client->request('GET', '/admin/subjects/1/edit');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /admin/subjects/1/edit");

        $form = $crawler->selectButton('save')->form(array(
            'name' => 'subject-edited',
            'teachers' => '1',
            'color' => '#00ffff'
        ));

        $client->submit($form);

        $crawler = $client->followRedirect();
    }

    /**
     * test on delete Subject
     *
     */
    public function testDeleteSubject()
    {
        $client = static::createClient();

        $this->login($client, 'marvin.sainteluce', 'cmw');

        $crawler = $client->request('GET', '/admin/subjects/1/edit');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /admin/subjects/1/edit");

        $client->submit($crawler->selectButton('form_submit')->form());

        $crawler = $client->followRedirect();

    }
}
