<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bitacoras;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\DateRange;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\Select;
use MoonShine\Fields\Date;

use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Bitacoras>
 */
class BitacorasResource extends ModelResource
{
    protected string $model = Bitacoras::class;
    protected bool $createInModal = true;
    protected bool $editInModal = true;
    protected bool $detailInModal = true;
    protected bool $columnSelection = true;
    protected bool $stickTable = false;
    protected bool $isAsync = true;

    protected string $title = 'Bitacoras';

    public function redirectAfterSave(): string
    {
        return $this->url();
    }

    public function redirectAfterDelete(): string
    {
        return $this->url();
    }

    public function indexFields(): array
    {
        return [
            ID::make(),
            Text::make('TDoc', 'tipo_documento'),
            Text::make('NDoc', 'numero_documento'),
            Text::make('Nombre', 'nombre'),
            Text::make('Apellidos', 'apellidos'),
            Text::make('Celular', 'celular'),
            Text::make('Correo', 'correo'),
            
           // Text::make('Proyecto', 'proyecto')
            //->showWhen('Tipo Alternativa', 'Proyecto Productivo'),
        
        
            
        ];
    }
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make(),
                Select::make('Tipo de Documento', 'tipo_documento')
                ->options([
                    'C.C' => 'Cédula de Ciudadanía',
                    'T.I' => 'Tarjeta de Identidad',
                    'C.E' => 'Cédula de Extranjería',
                    'P.P' => 'Pasaporte',
                    'D.N.I' => 'Documento Nacional de Identidad',
                    'R.C' => 'Registro Civil',
                    'NIT' => 'Número de Identificación Tributaria',
                    'PEP' => 'Permiso Especial de Permanencia',
                    'PPT' => 'Permiso por Protección Temporal',
                ])
                ->required(),
                Text::make('Número Documento', 'numero_documento')->required(),
                Text::make('Nombre', 'nombre')->required(),
                Text::make('Apellidos', 'apellidos')->required(),
                Text::make('Celular', 'celular')->required(),
                Text::make('Correo', 'correo')->required(),
                Select::make('Tipo Alternativa', 'tipo_alternativa')
                    ->options([
                        'contrato aprendizaje' => 'Contrato de aprendizaje',
                        'Vinculo Laboral' => 'Vínculo Laboral',
                        'proyecto productivo' => 'Proyecto Productivo',
                        'pasantia' => 'Pasantía',
                    ])
                    
                    ->required(),
                Text::make('Estado Sofia', 'estado_sofia')->required(),
                Text::make('Proyecto', 'proyecto')
                    ->showWhen('tipo_alternativa', 'proyecto productivo'),
                Text::make('Ficha', 'ficha')->required(),
                Text::make('Nombre Programa', 'nombre_programa')->required(),
                Text::make('Instructor Seguimiento', 'instructor_seguimiento'),
                Text::make('Número Radicado', 'numero_radicado'),
                Textarea::make('Observaciones', 'observaciones'),
                Date::make('Fecha Asignación', 'fecha_asignacion'),
                Date::make('Fecha Inicio EP', 'fecha_inicio_ep'),
                Date::make('Fecha Fin EP', 'fecha_fin_ep'),
                Switcher::make('Paz y Salvo', 'paz_salvo'),        ]),
        ];
    }

    /**
     * @param Bitacoras $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
