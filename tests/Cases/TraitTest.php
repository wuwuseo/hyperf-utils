<?php

declare(strict_types=1);

namespace HyperfTest\Cases;

use Cmf\Traits\Result;

/**
 * @internal
 * @coversNothing
 */
class TraitTest extends AbstractTestCase
{
    use Result;
    public function testTaritSuccess()
    {
        $dataOk = $this->success(111);
        $this->assertArrayHasKey('code',$dataOk);

    }

    public function testTaritError()
    {
        $dataFail = $this->error(222,'xxx');
        $this->assertArrayHasKey('msg',$dataFail);
    }

    public function testTaritResult()
    {
        $data = $this->result(222,'xxx');
        $this->assertArrayHasKey('code',$data);
        $this->assertArrayHasKey('data',$data);
        $this->assertArrayHasKey('msg',$data);
    }
}
