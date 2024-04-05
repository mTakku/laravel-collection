<?php

namespace Tests\Feature;

use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CollectionTest extends TestCase
{
    public function testCreateCollection()
    {
        $collection = collect([1, 2, 3]);
        $this->assertEqualsCanonicalizing([1, 2, 3], $collection->all());
    }

    public function testForEach()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        foreach ($collection as $key => $value) {
            $this->assertEquals($key + 1, $value);
        }
    }

    public function testCrud()
    {
        $collection = collect([]);
        $collection->push(1, 2, 3);
        $this->assertEqualsCanonicalizing([1, 2, 3], $collection->all());

        $result = $collection->pop();
        $this->assertEquals(3, $result);
        $this->assertEqualsCanonicalizing([1, 2], $collection->all());
    }

    public function testMap()
    {
        $collection = collect([1, 2, 3]);
        $result = $collection->map(function ($item) {
            return $item * 2;
        });
        $this->assertEqualsCanonicalizing([2, 4, 6], $result->all());

    }

    public function testMapInto()
    {
        $collection = collect(["Farel"]);
        $result = $collection->mapInto(Person::class);
        $this->assertEquals([new Person("Farel")], $result->all());
    }

    public function testMapSpread()
    {
        $collection = collect([
            ["Farel", "Mercys"],
            ["Vestia", "Zeta"]
        ]);

        $result = $collection->mapSpread(function ($firstName, $lastName) {
            $fullName = $firstName . ' ' . $lastName;
            return new Person($fullName);
        });

        $this->assertEquals([
            new Person("Farel Mercys"),
            new Person("Vestia Zeta"),
        ], $result->all());
    }

    public function testMapToGroups()
    {
        $collection = collect([
            [
                "name" => "Farel",
                "department" => "IT"
            ],
            [
                "name" => "Zeta",
                "department" => "IT"
            ],
            [
                "name" => "Takku",
                "department" => "HR"
            ]
        ]);

        $result = $collection->mapToGroups(function ($person) {
            return [
                $person["department"] => $person["name"]
            ];
        });

        $this->assertEquals([
            "IT" => collect(["Farel", "Zeta"]),
            "HR" => collect(["Takku"])
        ], $result->all());

    }
}
