<?php

class BiAddressesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('bi_addresses')->delete();
        
		\DB::table('bi_addresses')->insert(array (
			0 => 
			array (
				'id' => 3,
				'label' => 'Narrada Communication',
				'company' => 'PT. VIDHA INTI PRAJAPTI',
				'phone' => '+622129236133',
				'fax' => '+622129236137',
				'email' => 'anya@narrada.com',
				'address' => 'Jalan Radio 1 no 19. Jakarta 12130 - Indonesia',
				'map_url' => 'https://maps.googleapis.com/maps/api/staticmap?center=-6.247700,106.792564&zoom=15&size=400x400&maptype=roadmap&markers=color:red%7Clabel:R%7C-6.247700,106.792564',
				'status' => 'pub',
				'creator' => 1,
				'created_at' => '2014-11-24 12:57:47',
				'updated_at' => '2014-11-24 13:09:08',
			),
			1 => 
			array (
				'id' => 4,
				'label' => 'Narrada Channel O',
				'company' => 'PT. VICTORY INVESTA ARTHA',
				'phone' => '+622129236140',
				'fax' => '+622129236141',
				'email' => 'anya@narrada.com',
				'address' => 'Jalan Pela Raya No. 3 Jakarta 12130 - Indonesia',
				'map_url' => 'https://maps.googleapis.com/maps/api/staticmap?center=-6.2501215,106.7939093&zoom=15&size=400x400&maptype=roadmap&markers=color:red%7Clabel:P%7C-6.2501215,106.7939093',
				'status' => 'pub',
				'creator' => 1,
				'created_at' => '2014-11-24 13:08:01',
				'updated_at' => '2014-11-24 13:08:01',
			),
		));
	}

}
