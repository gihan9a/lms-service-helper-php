<?php

namespace Tests\Unit;

use Tests\TestCase;
use LMSHelper\ControllerHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Http\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Mockery;

/**
 * @covers LMSHelper\ControllerHelper
 * @psalm-suppress UndefinedInterfaceMethod
 * @psalm-suppress MixedMethodCall
 * @psalm-suppress UndefinedMagicMethod
 */
final class ControllerHelperTest extends TestCase
{
    public function tearDown(): void
    {
        \Mockery::close();
    }

    public function testFindModelOrFail(): void
    {
        $stub = Mockery::mock('alias:' . Model::class);
        $stub->shouldReceive('find')->with(1)->andReturn($stub, null);

        $mock = Mockery::mock(ControllerHelper::class);
        $this->assertInstanceOf(Model::class, $mock->findModelOrFail($stub::class, 1));

        // should throw exception if not found
        $this->expectException(ModelNotFoundException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('Unable to find model 1');
        $mock->findModelOrFail($stub::class, 1);
    }

    public function testRespond(): void
    {
        $response = new ResponseFactory();
        $mock = $this->getMockForTrait(ControllerHelper::class);

        $response = $mock->respond($response);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('{"code":200,"data":null,"errors":null}', $response->content());
    }
}
