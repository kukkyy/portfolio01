<?php
use Migrations\AbstractMigration;

class AddBirthday2ToUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('birthday', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }
}
