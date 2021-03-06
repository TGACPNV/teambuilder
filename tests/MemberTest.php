<?php
namespace TeamBuilder\Model;
use PHPUnit\Framework\TestCase;


class MemberTest extends TestCase
{
    static function setUpBeforeClass(): void
    {
        $sqlscript = file_get_contents(dirname(__DIR__,1).'/doc/sql/teambuilder.sql');
        $res = DB::execute($sqlscript);
    }

    /**
     * @covers Member::all()
     */
    public function testAll()
    {
        $this->assertEquals(51,count(Member::all()));
    }

    /**
     * @covers Member::find(id)
     */
    public function testFind()
    {
        $this->assertInstanceOf(Member::class,Member::find(1));
        $this->assertNull(Member::find(1000));
    }

    /**
     * @covers Member::where(criteria)
     * @depends testCreate
     */
    public function testWhere()
    {
        $this->assertEquals(5,count(Member::where("role_id",2)));
        $this->assertEquals(0,count(Member::where("role_id",222)));
    }

    public function testMake()
    {
        $member = Member::make(["name" => "XXX","password" => 'XXXPa$$w0rd', "role_id" => 1,"status_id"=>1]);
        $name = $member->name;
        $this->assertEquals("XXX",$name);

    }

    /**
     * @covers $member->create()
     * @depends testMake
     */
    public function testCreate()
    {
        $member = Member::make(["name" => "XXX","password" => 'XXXPa$$w0rd', "role_id" => 1,"status_id"=>1]);
        $this->assertTrue($member->create());
        $this->assertFalse($member->create());
    }

    /**
     * @covers $member->save()
     */
    public function testSave()
    {
        $member = Member::find(1);
        $savename = $member->name;
        $member->name = "newname";
        $this->assertTrue($member->save());
        $this->assertEquals("newname",Member::find(1)->name);
        $member->name = $savename;
        $member->save();
    }

    /**
     * @covers $member->save() doesn't allow duplicates
     */
    public function testSaveRejectsDuplicates()
    {
        $member = Member::find(1);
        $member->name = Member::find(2)->name;
        $this->assertFalse($member->save());
    }

    /**
     * @covers $member->delete()
     */
    public function testDelete()
    {
        $member = Member::find(1);
        $this->assertFalse($member->delete()); // expected to fail because of foreign key
        $member = Member::make(["name" => "dummy","password" => "dummy", "role_id" => 1,"status_id"=>1]);
        $member->create(); // to get an id from the db
        $id = $member->id;
        $this->assertTrue($member->delete()); // expected to succeed
        $this->assertNull(Member::find($id)); // we should not find it back
    }

    /**
     * @covers Member::destroy(id)
     */
    public function testDestroy()
    {
        $this->assertFalse(Member::destroy(1)); // expected to fail because of foreign key
        $member = Member::make(["name" => "dummy","password" => "dummy", "role_id" => 1,"status_id"=>1]);
        $member->create(); // to get an id from the db
        $id = $member->id;
        $this->assertTrue(Member::destroy($id)); // expected to succeed
        $this->assertNull(Member::find($id)); // we should not find it back
    }

    /**
     * Assume the well-know dataset of 'teambuilder.sql'
     * @covers $member->teams()
     */
    public function testTeams()
    {
        $this->assertEquals(1,count(Member::find(3)->teams()));
        $this->assertEquals(0,count(Member::find(9)->teams()));
        $this->assertEquals(3,count(Member::find(10)->teams()));
    }
}
