<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','run', 'email', 'password', 'mailing', 'last_login', 'categoria_id', 'profession_id', 'actividad', 'tipo_persona' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getCategoriaUsuarioAttribute(){
        return CategoriaUser::find($this->categoria_id);
        //return $this->belongsTo(CategoriaUser::class, 'categoria_id');
    }

    public function getTotalSaldoUsuariosAttribute(){
        return User::where('tipo_usuario', 3)->get()->sum('saldo');
    }

    public function getTotalSumaRecargasUsuariosAttribute(){
        return $this->hasMany(Sale::class)->sum('monto_venta');
    }

    public function getTotalRecargasUsuariosAttribute(){
        return $this->hasMany(Sale::class)->count();
    }

    public function getTotalSaldoSemanaAttribute(){
        $lunes = Carbon::parse('monday this week')->format('Y-m-d');
        $domingo = Carbon::parse('sunday this week')->format('Y-m-d');
        return User::whereBetween('created_at', [$lunes, $domingo])->where('tipo_usuario', 3)->get()->sum('saldo');
    }

    public function getTotalVentasSemanaAttribute(){
        $lunes = Carbon::parse('monday this week')->format('Y-m-d');
        $domingo = Carbon::parse('sunday this week')->format('Y-m-d');
        return Sale::whereBetween('created_at', [$lunes, $domingo])->get()->sum('monto_venta');
    }

    public function getTotalCantidadVentasSemanaAttribute(){
        $lunes = Carbon::parse('monday this week')->format('Y-m-d');
        $domingo = Carbon::parse('sunday this week')->format('Y-m-d');
        return Sale::whereBetween('created_at', [$lunes, $domingo])->get()->count();
    }

    public function getNuevosUsuariosPorSemanaAttribute(){
        $lunes = Carbon::parse('monday this week')->format('Y-m-d');
        $domingo = Carbon::parse('sunday this week')->format('Y-m-d');
        return User::whereBetween('created_at', [$lunes, $domingo])->where('tipo_usuario', 3)->get()->count();
    }

    public function getDocumentosPendienteAttribute(){
        return Document::where('estado', 1)->get()->count();
    }

    public function getDocumentosNuevosAttribute(){
        $lunes = Carbon::parse('monday this week')->format('Y-m-d');
        $domingo = Carbon::parse('sunday this week')->format('Y-m-d');
        return Document::whereBetween('created_at', [$lunes, $domingo])->where('estado', 2)->get()->count();
    }

    public function getTotalDocumentosAttribute(){
        return Document::where('estado', 2)->get()->count();
    }

    public function getTotalDescargasAttribute(){
        return Download::where('user_id', $this->id)->get()->count();
    }

    public function getUltimaDescargaAttribute(){
        return Download::where('user_id', $this->id)->get()->last();
    }

    public function hasAuthorizedCreditCard()
    {
        return $this->tbkToken;
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
