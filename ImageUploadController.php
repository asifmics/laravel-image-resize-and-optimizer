public function store(Request $request)
    {
        $data = $request->all();
        $vendorName =  Str::slug(auth()->user()->name).'-'.hexdec(uniqid());

        $data['photo'] = doUploadImage($vendorName,'uploads/vendor/optimize',$request->photo,'uploads/vendor/optimize','',100,'png');

        //dd('ok');
        //ModelName::create($data);
        return redirect(route('route-name'))->with('success', 'image added');

    }
