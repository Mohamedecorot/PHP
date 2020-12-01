<?php
namespace App;

use PHPUnit\Framework\TestCase;

function withParam(array $data, string $param, $value): string
{
    if (is_array($value)) {
        $value = implode(",", $value);
    }
    return http_build_query(array_merge($data, [$param => $value]));
}

function withParams($data, array $params): string
{
    foreach($params as $k => $v)
    if (is_array($v)) {
        $params[$v] = implode(",", $v);
    }
    return http_build_query(array_merge($data, $params));
}

class URLHelperTest extends TestCase {

    public function assertURLEquals (string $expected, string $url) {
        $this->assertEquals($expected, urldecode($url));
    }

    public function testWithParam () {
        $url = withParam([], 'k', 3);
        $this->assertURLEquals("k=3", $url);
    }

    public function testWithParamWithArray () {
        $url = withParam([], 'k', [3,2,1]);
        $this->assertURLEquals("k=3,2,1", $url);
    }

    public function testWithParams () {
        $url = withParams(["a" => 3], ["a" => 5, "b" => 6]);
        $this->assertURLEquals("a=5&b=6", $url);
    }

    public function testWithParamsWithArray () {
        $url = withParams(["a" => 3], ["a" => [5, 6], "b" => 6]);
        $this->assertURLEquals("a=5,6&b=6", $url);
    }
}