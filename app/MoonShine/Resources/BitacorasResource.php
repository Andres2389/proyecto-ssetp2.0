<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;

use App\Models\Bitacoras;
use Closure;


use Illuminate\View\ComponentAttributeBag;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\Relationships\BelongsTo;
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
use MoonShine\Components\TableBuilder;

/**
 * @extends ModelResource<Bitacoras>
 */
class BitacorasResource extends ModelResource
{
    protected string $model = Bitacoras::class;

    protected string $title = 'Bitacoras';

    protected bool $createInModal = true;
    protected bool $columnSelection = true;

    public function tdAttributes(): Closure
    {
        return function (
            Model $item,
            int $row,
            int $cell,
            ComponentAttributeBag $attr = null
        ): ComponentAttributeBag {

            $attr->setAttributes([
                'style' => 'border: 1px solid #aaa; padding: 2px; text-align: center;'
            ]);

            if ($cell === 18) {
                $attr->setAttributes([
                    
                    'style' => 'width: 200px; min-width: 600px; border: 1px solid  #aaaa; padding: 8px; text-align: center;'
                ]);
            }
 
            return $attr;
        };
    }
    


    public function indexFields(): array
    {
        return $this->fields();
    }
    
    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Date::make('Fecha Inicio EP', 'fecha_inicio_ep')->format("d.m.Y")->showOnExport() ->useOnImport(),
            Text::make('Numero de Ficha', 'fichas')->showOnExport()->useOnImport(),
            Date::make('Fecha Corte', 'fecha_corte')->format("d.m.Y")->showOnExport() ->useOnImport(),
            Text::make('Nombre Programa', 'programa_formacion')->showOnExport()->useOnImport(),
            Text::make('Estado de la ficha', 'estado_ficha')->showOnExport()->useOnImport(),
            Select::make('Tipo de Documento', 'tipo_documento')
                ->options([
                    'CC' => 'Cédula de Ciudadanía',
                    'TI' => 'Tarjeta de Identidad',
                    'CE' => 'Cédula de Extranjería',
                    'PA' => 'Pasaporte',
                    'PEP' => 'Permiso Especial de Permanencia',
                    'PPT' => 'Permiso por Protección Temporal',
                ])
                ->showOnExport()
                ->useOnImport()
                ->required(),
            Text::make('Numero Documento', 'numero_documento')->showOnExport()->useOnImport(),  
            Text::make('Nombre', 'nombre')->showOnExport()->useOnImport(),
            Text::make('Apellidos', 'apellidos')->showOnExport()->useOnImport(),
            Text::make('Celular', 'celular')->showOnExport()->useOnImport(),
            Text::make('Correo', 'correo')->showOnExport()->useOnImport(),
            Text::make('Estado', 'estado_sofia')->showOnExport()->useOnImport(),
            Select::make('Tipo Alternativa', 'tipo_alternativa')
                ->options([
                    'contrato de  aprendizaje' => 'Contrato de aprendizaje',
                    'vinculo laboral' => 'Vínculo Laboral',
                    'proyecto productivo' => 'Proyecto Productivo',
                    'pasantia' => 'Pasantía',
                    'monitorias'=>'Monitorias',
                ])
                ->showOnExport()
                ->useOnImport()
                ->nullable(),
            Text::make('instructor de seguimiento', 'instructores')->showOnExport()->useOnImport(),            
            Date::make('Fecha 18 meses', 'fecha_18_meses')->format("d.m.Y")->showOnExport()->useOnImport(),
            Date::make('Fecha Asignación', 'fecha_asignacion')->format("d.m.Y")->showOnExport()->useOnImport(),
            Textarea::make('Observaciones', 'observaciones')->showOnExport()->useOnImport(),
            Text::make('Juicios evaluativos', 'juicios_evaluativos')->showOnExport()->useOnImport(),
            Select::make('Momentos', 'momentos')
                ->options([
                    '1' => '1/1',
                    '2' => '2/2',
                    '3' => '3/3',  
                ])
                ->showOnExport()
                ->useOnImport()
                ->multiple(),
            Select::make('N Bitacoras', 'numero_bitacoras')
                ->options([
                    '1' => '1/12',
                    '2' => '2/12',
                    '3' => '3/12',
                    '4' => '4/12',
                    '5' => '5/12',
                    '6' => '6/12',
                    '7' => '7/12',
                    '8' => '8/12',
                    '9' => '9/12',
                    '10' => '10/12',
                    '11' => '11/12',
                    '12' => '12/12',
                ])
                ->showOnExport()
                ->useOnImport()
                ->multiple(),
            Switcher::make('Paz y Salvo', 'paz_salvo')->showOnExport(),
        ];
    }

      public function rules(Model $item): array
    {
        return [];
    }

    public function filters(): array
    {
        return [
            Text::make('Número de Ficha', 'fichas'),
            Text::make('Nombre Programa', 'programa_formacion'),
            Text::make('Número Documento', 'numero_documento'),
            Text::make('Apellidos', 'apellidos'),
            Text::make('Instructor de Seguimiento', 'instructores'), // Si es una relación, podría necesitar ajustes
            Select::make('Tipo Alternativa', 'tipo_alternativa')
                ->options([
                    'contrato de aprendizaje' => 'Contrato de aprendizaje',
                    'vinculo laboral' => 'Vínculo Laboral',
                    'proyecto productivo' => 'Proyecto Productivo',
                    'pasantia' => 'Pasantía',
                    'monitorias'=>'Monitorias',
                ])->nullable(),
            
        ];
    }

    public function search(): array
    {
        return ['id', 'apellidos', 'fichas','numero_documento'];
    }
 
}
