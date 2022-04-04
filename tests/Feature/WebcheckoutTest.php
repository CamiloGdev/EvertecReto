<?php
namespace Tests\Feature;

use App\Request\CreateSessionRequest;
use App\Request\GetInformationRequest;
use App\Services\WebcheckoutService;
use Dflydev\DotAccessData\Data;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebcheckoutTest extends TestCase
{
    public function testItCanGetInformationRequest()
    {
        $request = (new GetInformationRequest())->auth();
//        dd($request);
        $this->assertAuthSuccess($request);
    }

    public function testItCanGetCreateSessionRequest()
    {
        $request = (new CreateSessionRequest($this->getCreateSessionData()))->toArray();
//        dd($request);
        $this->assertAuthSuccess($request);

        $this->assertArrayHasKey('payment',$request);
        $this->assertArrayHasKey('expiration',$request);
        $this->assertArrayHasKey('locale',$request);
        $this->assertArrayHasKey('returnUrl',$request);
    }

    public function testItCanCreateSessionFromServiceCorrectly()
    {
        $data = $this->getCreateSessionData();
        $response = (new WebcheckoutService())->createSession($data);
        dd($response);
        $this->assertArrayHasKey('status',$response);
        $this->assertEquals('OK',$response['status']['status']);
        $this->assertArrayHasKey('requestId',$response);
        $this->assertArrayHasKey('processUrl',$response);

        $session_id = $response['requestId'];
        $responseGetSession = $response = (new WebcheckoutService())->getInformation($session_id);
        dump($responseGetSession);
        $this->assertEquals($session_id,$responseGetSession['requestId']);
        $this->assertArrayHasKey('status',$response);
        $this->assertEquals('PENDING',$response['status']['status']);
    }

    public function testItGetInformationFromServiceCorrectly()
    {

        $session_id = 51953;
        $responseGetSession = $response = (new WebcheckoutService())->getInformation($session_id);
//        dump($responseGetSession);

        $this->assertEquals($session_id,$responseGetSession['requestId']);
        $this->assertArrayHasKey('status',$response);
        $this->assertEquals('APPROVED',$response['status']['status']);
    }

    /**
     * @param array $request
     * 51948
     */
    private function assertAuthSuccess(array $request): void
    {
        $this->assertArrayHasKey('auth', $request);
        $this->assertArrayHasKey('login', $request['auth']);
        $this->assertArrayHasKey('tranKey', $request['auth']);
        $this->assertArrayHasKey('nonce', $request['auth']);
        $this->assertArrayHasKey('seed', $request['auth']);
    }

    private function getCreateSessionData(): array
    {
        return [
            'payment' => [
                'reference' => 'TEST_1000',
                'description' => 'conexion con webcheckout desde un test',
                'amount' => [
                    'currency' => 'COP',
                    'total' => '10000'
                ]
            ],
            'returnUrl' => route('home'),
            'expiration' => date('c', strtotime('+2 days')),
        ];
    }
}
