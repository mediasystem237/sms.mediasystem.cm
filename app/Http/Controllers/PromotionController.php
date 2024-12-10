<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    /**
     * Affiche les promotions pour la page principale des promotions.
     */
    public function index()
    {
        try {
            $mainPromotions = Promotion::where('category', 'sms-marketing')
                ->where('is_featured', true)
                ->get();

            $sidebarPromotions = Promotion::where('category', 'sidebar')->get();

            return view('pages.promotions', compact('mainPromotions', 'sidebarPromotions'));
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors du chargement des promotions : ' . $e->getMessage());
        }
    }

    /**
     * Affiche le tableau de bord pour gérer les promotions.
     */
    public function dashboard()
    {
        try {
            $mainPromotions = Promotion::where('category', 'sms-marketing')->orderBy('created_at', 'desc')->get();
            $sidebarPromotions = Promotion::where('category', 'sidebar')->orderBy('created_at', 'desc')->get();
            $advertisements = Promotion::where('category', 'advertisement')->orderBy('created_at', 'desc')->get();

            return view('dashboard', compact('mainPromotions', 'sidebarPromotions', 'advertisements'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Impossible de charger le tableau de bord.');
        }
    }

    /**
     * Crée une nouvelle promotion avec gestion avancée des erreurs.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'link' => 'nullable|url',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'category' => 'required|string|in:sms-marketing,sidebar,advertisement',
                'is_featured' => 'nullable|boolean',
            ]);

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('promotions', 'public');
            }

            Promotion::create($data);

            return redirect()->route('dashboard')->with('success', 'Promotion ajoutée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la sauvegarde de la promotion : ' . $e->getMessage());
        }
    }

    /**
     * Supprime une promotion avec vérification et gestion de l'image associée.
     */
    public function destroy($id)
    {
        try {
            $promotion = Promotion::findOrFail($id);

            if ($promotion->image) {
                \Storage::delete('public/' . $promotion->image);
            }

            $promotion->delete();

            return redirect()->route('dashboard')->with('success', 'Promotion supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }

    /**
     * Affiche le formulaire d'édition pour une promotion.
     */
    public function edit($id)
    {
        try {
            $promotion = Promotion::findOrFail($id);
            return view('dashboard.edit-promotion', compact('promotion'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Impossible de récupérer les données de la promotion : ' . $e->getMessage());
        }
    }

    /**
     * Met à jour une promotion avec vérification et gestion de l'image.
     */
    public function update(Request $request, $id)
    {
        try {
            $promotion = Promotion::findOrFail($id);

            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'link' => 'nullable|url',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'category' => 'required|string|in:sms-marketing,sidebar,advertisement',
                'is_featured' => 'nullable|boolean',
            ]);

            if ($request->hasFile('image')) {
                if ($promotion->image) {
                    \Storage::delete('public/' . $promotion->image);
                }

                $data['image'] = $request->file('image')->store('promotions', 'public');
            }

            $promotion->update($data);

            return redirect()->route('dashboard')->with('success', 'Promotion mise à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour de la promotion : ' . $e->getMessage());
        }
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/placeholder.png');
    }

}
