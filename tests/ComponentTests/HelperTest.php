<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;

require_once dirname(__FILE__).'../../../libraries/qcontrol/include.php';
require_once dirname(__FILE__).'../../../components/com_qcontrol/helpers/agendahelper.php';

final class HelperTest extends TestCase
{

	public function testCanCreateAgendaHelper(){

		$this->assertInstanceOf(AgendaComponentHelper::class, new AgendaComponentHelper);
			

	}


	public function testGet()
{
    // create our http client (Guzzle)
    $client = new Client('http://localhost:8000', array(
        'request.options' => array(
            'exceptions' => false,
        )
    ));

    $nickname = 'ObjectOrienter'.rand(0, 999);
    $data = array(
        'nickname' => $nickname,
        'avatarNumber' => 5,
        'tagLine' => 'a test dev!'
    );

    $request = $client->post('/api/programmers', null, json_encode($data));
    $response = $request->send();

    $this->assertEquals(201, $response->getStatusCode());
    $this->assertTrue($response->hasHeader('Location'));
    $data = json_decode($response->getBody(true), true);
    $this->assertArrayHasKey('nickname', $data);
}
}