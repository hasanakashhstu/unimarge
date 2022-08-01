<div>
    <form wire:submit.prevent="getTutionFeeById">
        <div class="row">
            <div class="form-group col-9" style="float: left;">
                <label class="required" for="tution_fees_id">Program
                    Name</label>
                <select id="tution_fees_id" wire:model="tution_fees_id" class="form-control">
                    <option value="" selected>Choose a option</option>
                    @foreach ($tutionFees as $tutionFee)
                        <option value="{{ $tutionFee->tution_fees_id }}">
                            {{ $tutionFee->program_name }}</option>
                    @endforeach
                </select>
                @error('tution_fees_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-3" style="float: right;">
                <label for="semester">Total Semester:</label>
                <input type="number" id="semester" wire:model="semester" class="form-control">
                @error('semester')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit" id="tutionFeesCalculatorSubmit" class="btn btn-primary">Submit</button>
    </form>

    <div wire:loading wire:target="getTutionFeeById">
        <p class="text-danger">Please, wait...</p>
    </div>

    @if ($tutionFeeById)
        <h5 class="alert-primary"><b>Total:</b>
            {{ round($tutionFeeById->fee_per_credit * $tutionFeeById->total_credit) }}/- (BDT)</h5>
        <hr>
        <div>
            Cost Per Credit : <span id="costpercrdit">{{ round($tutionFeeById->fee_per_credit) }}-/</span>
            <br>
            Student Activity Fee : <span id="studentactivityfee">0/-</span>
            <br>
            Library Fee : <span id="libraryfee">0/-</span>
            <br>
            Computer Lab Fee : <span id="computerlabfee">0/-</span>
            <br>
            Science Lab Fee : <span id="sciencelabfee">0/-</span>
            <br>
            Studio course Fee : <span id="studiocoursefee">0/-</span>
            <br>
            Average Semester Cost : <span
                id="averagesemestercost">{{ round(($tutionFeeById->fee_per_credit * $tutionFeeById->total_credit) / $semester) }}/-</span>
            <br>
            Years : <span id="year">{{ round($semester / 3) }}</span>
            <hr>

            Total Number of Semester : <span id="totalsemster">{{ $semester }}</span>
            <hr>
            Total Courses (Per Semester) : <span id="perSemCourse">{{ round(46 / $semester) }}</span>
            <hr>
            Total Number of Credit : <span id="totalcredit">{{ $tutionFeeById->total_credit }}</span>
        </div>
        <hr>
    @endif
</div>
