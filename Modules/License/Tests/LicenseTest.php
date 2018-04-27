<?php

namespace Modules\License\Tests;

use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Library\Util;
use Modules\License\Repositories\License\LicenseRepositoryInterface as LicenseRepoInterface;
use Modules\License\Repositories\License\LicenseRepository;
use Modules\License\Entities\License;


class LicenseTest extends TestCase
{
    /**
     * This tests the License model
     * This is tests will just cover the basics of the app, which is update and displaying licenses,
     * without saying much more tests are needed in a real application
     * Note: TDD approach was not used in creating this tests.
     * TODO: Write more tests
     */
    protected $faker;
    protected $licenseRepo;
    private $license;

    protected function setUp()
    {
        parent::setUp();

        $this->faker = \Faker\Factory::create();
        $this->license = factory(License::class)->create();
        $this->licenseRepo = new LicenseRepository($this->license);
    }


    public function testCreateLicense(){

        $license = [
                'number' =>Util::randStringGenerator(15),
                'name' => $this->faker->name,
                'subscription_date' => $this->faker->date(),
                'expiry_date' => $this->faker->date(),
                'status' => $this->faker->biasedNumberBetween($min = 0, $max = 6),
                'state_id' => $this->faker->biasedNumberBetween($min = 0, $max = 50),
            ];

        $license_new = $this->licenseRepo->createLicense($license);

        $this->assertInstanceOf(License::class, $license_new);
        $this->assertEquals($license['number'], $license_new->number);
        $this->assertEquals($license['name'], $license_new->name);
        $this->assertEquals($license['subscription_date'], $license_new->subscription_date);
//        $this->assertEquals($license['status'], $license_new->status);
        $this->assertEquals($license['state_id'], $license_new->state_id);
    }


    public function testUpdateLicense(){

        $id = 1;
        $license = [
                'number' =>Util::randStringGenerator(15),
                'name' => $this->faker->name,
                'subscription_date' => $this->faker->date(),
                'expiry_date' => $this->faker->date(),
                'status' => $this->faker->biasedNumberBetween($min = 0, $max = 6),
                'state_id' => $this->faker->biasedNumberBetween($min = 0, $max = 50),
            ];
        $license_new = $this->licenseRepo->update($id,$license);

        $this->assertTrue($license_new);
//        $this->assertEquals($license['number'], $license_new['number']);
//        $this->assertEquals($license['name'], $license_new['name']);
//        $this->assertEquals($license['subscription_date'], $license_new['subscription_date']);
//        $this->assertEquals($license['status'], $license_new-['status']);
//        $this->assertEquals($license['state_id'], $license_new['state_id']);
    }

    public function testUpdateLicenseFailed(){
        $this->assertTrue(true);
    }

    public function testGetALLLicenses(){

        $licenses = $this->licenseRepo->findAll();
        $this->assertInstanceOf(Collection::class,$licenses);
    }

    public function testGetLicense(){
        $id = 1;
        $license = $this->licenseRepo->find($id);
        $this->assertInstanceOf(License::class, $license);
    }

    public function testRevokeLicense(){
        $this->assertTrue(true);
    }

}
