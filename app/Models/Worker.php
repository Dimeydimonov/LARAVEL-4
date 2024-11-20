<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Worker extends Model
    {
    use HasFactory;

    // Название таблицы
    protected $table = 'workers';

    // Указываем разрешенные для массового присваивания поля
    protected $fillable = [
    'name', 'surname', 'email', 'position_id', 'age', 'description', 'is_married'
    ];

    // Связь с позицией (каждый работник имеет одну позицию)
    public function position()
    {
    return $this->belongsTo(Position::class);  // Убираем пустой второй параметр
    }

    // Связь с профилем (каждый работник может иметь один профиль)
    public function profile()
    {
    return $this->hasOne(Profile::class);  // Убираем пустой второй параметр
    }

    // Связь с проектами (работник может работать на нескольких проектах)
    public function projects()
    {
    return $this->belongsToMany(Project::class);  // Связь многие ко многим
    }

    public function avatar() {
        return $this->morphOne(Avatar::class, 'avatarable');
    }

    public function reviems()
    {
        return $this->morphMany(Reviem::class, 'reviemable');

    }




    }
