<?php

namespace App\Http\Controllers;
use App\Models\Reserv;
use App\Models\Package;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{
    public function index()
{
    $packages = Package::all();

    return view('Admin.Package.ListePackage', compact('packages'));

}
    public function create()
    {
        $categories = category::all();
        return view('Admin.Package.AddPackage',['categories' => $categories]);
    }

    public function store(Request $request)
    {

      $request->validate([
            'description' => 'required|string|max:300',
            'prix_unit' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'date_retour' => 'required|date',
            'date_depart' => 'required|date',
            'lieu_depart' => 'required|string',
            'transport' => 'required|string',
            'services_inclus' => 'required|string',
            'activite' => 'required|string',
            'nbr_place_dispo' => 'required|integer',
            'destination' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $filePath = public_path('uploads');
        $insert = new Package();
        $insert->description = $request->description;
        $insert->prix_unit = $request->prix_unit;
        $insert->date_retour = $request->date_retour;
        $insert->date_depart = $request->date_depart;
        $insert->lieu_depart = $request->lieu_depart;
        $insert->transport = $request->transport;
        $insert->services_inclus = $request->services_inclus;
        $insert->activite = $request->activite;
        $insert->nbr_place_dispo = $request->nbr_place_dispo;
        $insert->destination = $request->destination;
        $insert->category_id = $request->category_id;

        if ($request->hasfile('photo')) {
            $file_name = $request->file('photo')->store('pack','public');
             //= time() . $file->getClientOriginalName();

           // $file->move($filePath, $file_name);
            $insert->photo = $file_name;
        }

        $result = $insert->save();
        Session::flash('success', 'User registered successfully');
        return redirect()->route('ListePackage');
    }

    public function show(Package $package)
    {
        return view('Admin.Package.ListePackage', compact('packages'));
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $categories = Category::all();
        return view('Admin.Package.EditPackage', compact('package', 'categories'));
    }

    public function update(Request $request, $id)
    {   $package = Package::findOrFail($id);
        $request->validate([
            'description' => 'required|string|max:300',
            'prix_unit' => 'required|numeric',
            'photo' => 'nullable|string',
            'date_retour' => 'required|date',
            'date_depart' => 'required|date',
            'lieu_depart' => 'required|string',
            'transport' => 'required|string',
            'services_inclus' => 'required|string',
            'activite' => 'required|string',
            'nbr_place_dispo' => 'required|integer',
            'destination' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);


    $package->description = $request->description;
    $package->prix_unit = $request->prix_unit;
    $package->date_retour = $request->date_retour;
    $package->date_depart = $request->date_depart;
    $package->lieu_depart = $request->lieu_depart;
    $package->transport = $request->transport;
    $package->services_inclus = $request->services_inclus;
    $package->activite = $request->activite;
    $package->nbr_place_dispo = $request->nbr_place_dispo;
    $package->destination = $request->destination;
    $package->category_id = $request->category_id;

    if ($request->hasFile('photo')) {
        $file_name = $request->file('photo')->store('pack', 'public');
        $package->photo = $file_name;
    }

         $package->save();
    return redirect()->route('ListePackage')->with('success', 'Package mis à jour avec succès.');
}

public function destroy(Package $package)
{
    $package->delete();
    return redirect()->route('ListePackage')->with('success', 'Package deleted successfully.');
}

public function showPackagesForClients()
{
    $packages = Package::all();

    return view('package', compact('packages'));
}
public function description($id){
    $package = Package::findOrFail($id);
    return view ('description', compact('package'));
}




}
