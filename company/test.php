<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Input Example</title>
    <style>
        .date-container {
            position: relative;
            display: inline-block;
        }

        #formatted-date {
            width: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        #hidden-date {
            display: none;
        }
    </style>
</head>
<body>
    <div class="date-container">
        <input type="text" id="formatted-date" placeholder="Select Date">
        <input type="date" id="hidden-date">
    </div>

    <script>
        const formattedDateInput = document.getElementById('formatted-date');
const calendar = document.getElementById('calendar');

// Create calendar structure
function createCalendar() {
    const now = new Date();
    const month = now.getMonth();
    const year = now.getFullYear();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const firstDay = new Date(year, month, 1).getDay();
    
    let html = '<table>';
    html += '<thead><tr>';
    ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'].forEach(day => {
        html += `<th>${day}</th>`;
    });
    html += '</tr></thead><tbody><tr>';

    // Fill the initial empty cells
    for (let i = 0; i < firstDay; i++) {
        html += '<td></td>';
    }

    // Fill the days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month, day);
        const isToday = date.toDateString() === new Date().toDateString();
        html += `<td data-date="${date.toISOString().split('T')[0]}" class="${isToday ? 'today' : ''}">${day}</td>`;

        // Break into a new row after Saturday
        if ((firstDay + day) % 7 === 0) {
            html += '</tr><tr>';
        }
    }
    html += '</tr></tbody></table>';

    calendar.innerHTML = html;
}

// Format a date as "Month Day, Year"
function formatDate(date) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Intl.DateTimeFormat('en-US', options).format(date);
}

// Toggle calendar visibility
formattedDateInput.addEventListener('click', () => {
    calendar.style.display = calendar.style.display === 'none' ? 'block' : 'none';
});

// Handle date selection
calendar.addEventListener('click', (e) => {
    if (e.target.tagName === 'TD' && e.target.dataset.date) {
        const selectedDate = new Date(e.target.dataset.date);
        formattedDateInput.value = formatDate(selectedDate);
        calendar.style.display = 'none';
    }
});

// Create calendar on page load
createCalendar();

// Close calendar if clicked outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('.date-picker')) {
        calendar.style.display = 'none';
    }
});

    </script>
</body>
</html>
