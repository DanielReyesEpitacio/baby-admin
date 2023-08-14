@extends('layouts.masterpage')

@section('page_title','Graficos')

@section('main_content')

    <div class="row">
        <div class="col-11 m-auto">
            <p>Haga click en las etiquetas para filtrar<p>
            <canvas id="chart"></canvas>
        </div>
    </div>
@endsection

@section('scripts_content')
<script>
                document.addEventListener('DOMContentLoaded',init)

                async function init(){
                    let dataset= await getDataset();
                    const labels = dataset.dates.map(timestamp =>{
                        const date = new Date(timestamp);
                        return date.toLocaleDateString();
                    });
                    const canvas = document.getElementById('chart').getContext('2d');
                    const chart=new Chart(canvas,{
                        type:'line',
                        data:{
                            labels:labels,
                            datasets:[
                                {
                                    label:'Caja',
                                    data: dataset.items.Caja,
                                    borderColor:'#0f0',
                                    backgroundColor: '#0f0',
                                    borderWidth:1,
                                },
                                {
                                    label:'Rappi',
                                    data: dataset.items.Rappi,
                                    borderColor:'#fa0',
                                    backgroundColor: '#fa0',
                                    borderWidth:1,
                                },
                                {
                                    label:'Terminal',
                                    data: dataset.items.Terminal,
                                    borderColor:'#000',
                                    backgroundColor: '#000',
                                    borderWidth:1,
                                },
                                {
                                    label:'Gastos',
                                    data: dataset.items.Gastos,
                                    borderColor:'#f00',
                                    backgroundColor: '#f00',
                                    borderWidth:2,
                                },
                            ],
                        },
                        options:{
                            responsive:true,
                        }
                    });
                }
                
                async function getDataset(){
                    const response = await fetch('http://localhost:8000/api/charts');
                    const data = await response.json();
                    return data;
                }
                
            </script>
@endsection


