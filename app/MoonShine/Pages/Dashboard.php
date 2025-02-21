<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use MoonShine\Metrics\ValueMetric;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Column;
use App\Models\User;
use App\Models\Bitacoras;
use MoonShine\Components\MoonShineComponent;

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Dashboard';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		$totalUsers = User::count();
        $totalAprendices = Bitacoras::count();

        $totalContratos = Bitacoras::whereJsonContains('tipo_alternativa', 'contrato de aprendizaje')->count();
        $totalPasantias = Bitacoras::whereJsonContains('tipo_alternativa', 'pasantia')->count();
        $totalProyecto = Bitacoras::whereJsonContains('tipo_alternativa', 'proyecto productivo')->count();
        $totalMonitorias = Bitacoras::whereJsonContains('tipo_alternativa', 'monitorias')->count();
        $totalVinculos = Bitacoras::whereJsonContains('tipo_alternativa', 'vinculo laboral')->count();
        return [
            Grid::make([
               Column::make([
                ValueMetric::make('Usuarios totales')
                ->value($totalUsers)
                ->icon('heroicons.user')
                ->withAttributes([
                  'style'=>'background-color: #E6E6E6 '
                ]),
               ])->columnSpan(4),

               Column::make([
                ValueMetric::make('Aprendices totales')
                ->value($totalAprendices)
                ->icon('heroicons.academic-cap')
                ->withAttributes([
                  'style'=>'background-color: #E6E6E6 '
                ]),
               ])->columnSpan(4),

               Column::make([
                ValueMetric::make('Contratos totales')
                    ->value($totalContratos)
                    ->icon('heroicons.document-text')
                    ->withAttributes([
                        'style' => 'background-color: #E6E6E6'
                    ]),
            ])->columnSpan(4),

            Column::make([
                ValueMetric::make('Pasantías totales')
                    ->value($totalPasantias)
                    ->icon('heroicons.book-open')
                    ->withAttributes([
                        'style' => 'background-color: #E6E6E6'
                    ]),
            ])->columnSpan(4),
            Column::make([
                ValueMetric::make('Proyectos productivos')
                    ->value($totalProyecto)
                    ->icon('heroicons.puzzle-piece')
                    ->withAttributes([
                        'style' => 'background-color: #E6E6E6'
                    ]),
            ])->columnSpan(4),
            Column::make([
                ValueMetric::make('Monitorías totales')
                    ->value($totalMonitorias)
                    ->icon('heroicons.newspaper')
                    ->withAttributes([
                        'style' => 'background-color: #E6E6E6'
                    ]),
            ])->columnSpan(4),
            Column::make([
                ValueMetric::make('Vinculos totales')
                    ->value($totalVinculos)
                    ->icon('heroicons.newspaper')
                    ->withAttributes([
                        'style' => 'background-color: #E6E6E6'
                    ]),
            ])->columnSpan(4)
               
            ]),

        ];
	}
    
}
