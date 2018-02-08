<?php namespace Bantenprov\BGBurukPerawatan\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\BGBurukPerawatan\Facades\BGBurukPerawatan;

/* Models */
use Bantenprov\BGBurukPerawatan\Models\Bantenprov\BGBurukPerawatan\BGBurukPerawatan as BGBurukPerawatan;
use Bantenprov\BGBurukPerawatan\Models\Bantenprov\BGBurukPerawatan\Province;
use Bantenprov\BGBurukPerawatan\Models\Bantenprov\BGBurukPerawatan\Regency;

/* etc */
use Validator;

/**
 * The BGBurukPerawatanController class.
 *
 * @package Bantenprov\BGBurukPerawatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class BGBurukPerawatanController extends Controller
{

    protected $province;

    protected $regency;

    protected $bg_buruk_perawatan;

    public function __construct(Regency $regency, Province $province, BGBurukPerawatan $bg_buruk_perawatan)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->bg_buruk_perawatan     = $bg_buruk_perawatan;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $bg_buruk_perawatan = $this->bg-buruk-perawatan->find($id);

        return response()->json([
            'negara'    => $bg-buruk-perawatan->negara,
            'province'  => $bg-buruk-perawatan->getProvince->name,
            'regencies' => $bg-buruk-perawatan->getRegency->name,
            'tahun'     => $bg-buruk-perawatan->tahun,
            'data'      => $bg-buruk-perawatan->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->bg-buruk-perawatan->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->bg-buruk-perawatan->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

