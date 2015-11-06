// Morris.js Charts sample data for SB Admin template

$(function() {

    // Area Chart
    Morris.Area({
        element: 'morris-fine-chart',
        data: [{
            period: '2010 Q1',
            FineAmounted: 2666,
            FineCollected: 1509
        }, {
            period: '2010 Q2',
            FineAmounted: 2778,
            FineCollected: 2294
        }, {
            period: '2010 Q3',
            FineAmounted: 4912,
            FineCollected: 1969
        }, {
            period: '2010 Q4',
            FineAmounted: 3767,
            FineCollected: 3597
        }, {
            period: '2011 Q1',
            FineAmounted: 6810,
            FineCollected: 1914
        }, {
            period: '2011 Q2',
            FineAmounted: 5670,
            FineCollected: 4293
        }, {
            period: '2011 Q3',
            FineAmounted: 4820,
            FineCollected: 3795
        }, {
            period: '2011 Q4',
            FineAmounted: 15073,
            FineCollected: 5967
        }, {
            period: '2012 Q1',
            FineAmounted: 10687,
            FineCollected: 4460
        }, {
            period: '2012 Q2',
            FineAmounted: 8432,
            FineCollected: 5713
        }],
        xkey: 'period',
        ykeys: ['FineAmounted', 'FineCollected'],
        labels: ['FineAmounted', 'FineCollected'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    // Donut Chart
    Morris.Donut({
        element: 'morris-book-chart',
        data: [{
            label: "Non-Lendable Books",
            value: 12
        }, {
            label: "Lendable Books",
            value: 50
        }, {
            label: "Reference Books",
            value: 20
        }],
        resize: true
    });

    // Donut Chart
    Morris.Donut({
        element: 'morris-user-chart',
        data: [{
            label: "Architecture",
            value: 12
        }, {
            label: "Civil",
            value: 50
        }, {
            label: "Computer",
            value: 20
        }, {
            label: "Electrical",
            value: 12
        }, {
            label: "Electronics",
            value: 30
        }, {
            label: "Mechanical",
            value: 20
        }],
        resize: true
    });
});
