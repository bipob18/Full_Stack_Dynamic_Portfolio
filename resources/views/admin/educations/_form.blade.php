<div class="grid">
    <div class="field">
        <label for="degree">Degree *</label>
        <input id="degree" name="degree" value="{{ old('degree', $education->degree) }}" placeholder="SSC / Diploma / BSc" required>
    </div>

    <div class="field">
        <label for="institute">Institute *</label>
        <input id="institute" name="institute" value="{{ old('institute', $education->institute) }}" placeholder="Your school/college/university" required>
    </div>

    <div class="field">
        <label for="start_year">Start year</label>
        <input id="start_year" name="start_year" value="{{ old('start_year', $education->start_year) }}" placeholder="e.g. 2018">
    </div>

    <div class="field">
        <label for="end_year">End year</label>
        <input id="end_year" name="end_year" value="{{ old('end_year', $education->end_year) }}" placeholder="e.g. 2022">
    </div>

    <div class="field">
        <label for="grade">Result / Grade</label>
        <input id="grade" name="grade" value="{{ old('grade', $education->grade) }}" placeholder="GPA/CGPA/Division">
    </div>

    <div class="field">
        <label for="sort_order">Sort order</label>
        <input id="sort_order" name="sort_order" value="{{ old('sort_order', $education->sort_order ?? 0) }}" placeholder="0">
    </div>
</div>

<div class="field" style="margin-top: 12px;">
    <label for="description">Description</label>
    <textarea id="description" name="description" placeholder="Optional: department, achievements, details...">{{ old('description', $education->description) }}</textarea>
</div>

