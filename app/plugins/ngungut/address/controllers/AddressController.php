<?php namespace Ngungut\Address\Controller;

use BaseController;
use Ngungut\Address\Model\Address;

/**
 * Class AddressController
 * Contain Post & Page Handler
 */
class AddressController extends BaseController {
    /**
     * set default layout
     * @var string
     */
    protected $layout = 'nccms::layouts.admin';

    /**
     * Caegory Post Page
     *
     */
	public function index()
	{
        $this->layout->title = 'Address - NCCMS';
        $this->layout->with('script', 'addr::scripts.address')
            ->with('style', 'addr::styles.address');
        $this->layout->content = \View::make('addr::address')
            ->with('addresses', Address::all())
            ->with('title', 'Address');
	}

    /**
     * Category Save action handler
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doAddress(){
        if(\Input::has('delete')){
            $id = \Input::get('theID');
            Address::destroy($id);
            return \Redirect::to('address');
        }
        $rules = array(
            'aLabel' => 'required|max:128',
            'aCompany' => 'required|max:128',
            'aStatus' => 'required|max:3',
            'aAddress' => 'required',
            'aPhone' => 'max:25',
            'aFax' => 'max:25',
            'aEmail' => 'max:128',
            'aStatus' => 'max:3',
            'aURL' => 'url',
        );
        $display = array(
            'aLabel' => 'Label Name',
            'aCompany' => 'Company Name',
            'aAddress' => 'Office Address',
            'aStatus' => 'Status',
            'aPhone' => 'Contact Phone',
            'aFax' => 'Contact Fax',
            'aEmail' => 'Contact Email',
            'aStatus' => 'Status',
            'aURL' => 'Map Static URL',
        );

        $validator = \Validator::make(\Input::all(), $rules, array(), $display);
        if($validator->fails()) {
            return \Redirect::to('address')
                ->withErrors($validator)
                ->withInput(\Input::all());
        }else{
            if(Input::has('aID')){
                $address = Address::find(\Input::get('aID'));
                $address->label = \Input::get('aLabel');
                $address->company = \Input::get('aCompany');
                $address->phone = (\Input::has('aPhone')) ? \Input::get('aPhone'):null;
                $address->fax = (\Input::has('aFax')) ? \Input::get('aFax'):null;
                $address->email = (\Input::has('aEmail')) ? \Input::get('aEmail'):null;
                $address->address = \Input::get('aAddress');
                $address->map_url = (\Input::has('aURL')) ? \Input::get('aURL'):null;
                $address->status = \Input::get('aStatus');
                $address->save();
            }else{
                Address::create([
                    'label' => \Input::get('aLabel'),
                    'company' => \Input::get('aCompany'),
                    'phone' => (\Input::has('aPhone')) ? \Input::get('aPhone'):null,
                    'fax' => (\Input::has('aFax')) ? \Input::get('aFax'):null,
                    'email' => (\Input::has('aEmail')) ? \Input::get('aEmail'):null,
                    'address' => \Input::get('aAddress'),
                    'map_url' => (\Input::has('aURL')) ? \Input::get('aURL'):null,
                    'status' => \Input::get('aStatus'),
                    'creator' => \Session::get('logedin')
                ]);
            }
            return \Redirect::to('address');
        }
    }

}
