<script>
    $(document).ready(function() {
        fetch('https://prices.runescape.wiki/api/v1/osrs/timeseries?timestep=6h&id=' + '{{ $item_id }}')
            .then(response => response.json())
            .then(data => {
                const timestamps = data.data.map(d => new Date(d.timestamp * 1000).toLocaleString());
                const highPrices = data.data.map(d => d.avgHighPrice);
                const lowPrices = data.data.map(d => d.avgLowPrice);

                // Create a new row and canvas element
                const row = document.createElement('div');
                row.classList.add('row');
                const canvas = document.createElement('canvas');
                canvas.id = 'priceChart';
                canvas.width = 400;
                canvas.height = 150;

                // Append the canvas to the row and the row to the container
                row.appendChild(canvas);
                document.getElementById('graph-container').appendChild(row);

                // Get the max and min prices
                const maxHighPrice = Math.max(...highPrices);
                const minLowPrice = Math.min(...lowPrices);

                // const ctx = document.getElementById('priceChart').getContext('2d');
                const chart = new window.Chart(canvas, {
                    type: 'line',
                    data: {
                        labels: timestamps,
                        datasets: [{
                                label: 'Avg High Price',
                                data: highPrices,
                                borderColor: '#5bc0de',
                                fill: false
                            },
                            {
                                label: 'Avg Low Price',
                                data: lowPrices,
                                borderColor: '#9acd32',
                                fill: false
                            }
                        ]
                    },
                    options: {
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            interect: true
                        },
                        plugins: {
                            zoom: {
                                zoom: {
                                    wheel: {
                                        enabled: true,
                                    },
                                    pinch: {
                                        enabled: true
                                    },
                                    mode: 'x',
                                    limits: {
                                        y: {
                                            min: minLowPrice,
                                            max: maxHighPrice
                                        },
                                        y2: {
                                            min: minLowPrice,
                                            max: maxHighPrice
                                        }
                                    }
                                },
                                pan: {
                                    enabled: true,
                                    mode: 'xy'
                                }
                            }
                        }
                    },
                })
            });
    });
</script>