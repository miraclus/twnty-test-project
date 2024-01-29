<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\EmployeeRequest;
use App\Http\Resources\Employee\EmployeeResource;
use App\Interfaces\WeatherInterface;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $employees = Employee::all();

        return EmployeeResource::collection($employees);
    }

    public function update(Employee $employee, EmployeeRequest $request): EmployeeResource
    {
        $employee->update($request->validated());

        return EmployeeResource::make($employee);
    }

    public function store(EmployeeRequest $request): EmployeeResource
    {
        $employee = Employee::create($request->validated());

        return EmployeeResource::make($employee);
    }

    public function show(Employee $employee): EmployeeResource
    {
        return EmployeeResource::make($employee);
    }

    public function destroy(Employee $employee): Response
    {
        $employee->delete();

        return response()->noContent();
    }

    public function test(WeatherInterface $weatherService)
    {
//        $weatherService->update();
        $employee = Employee::all()->first();
        dd($employee->weatherAdvice);
    }

    public function downloadPdf(Employee $employee): JsonResponse
    {
        $pdfFileName = 'employee-profile-' . $employee->id . '.pdf';
        $pdfPath = 'pdf/' . $pdfFileName;

        $pdf = PDF::loadView('employees.pdf', compact('employee'));
        Storage::disk('public')->put($pdfPath, $pdf->output());

        $downloadLink = Storage::disk('public')->url($pdfPath);

        return response()->json(['download_link' => $downloadLink]);
    }
}
