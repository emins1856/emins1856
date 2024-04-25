using System;

class Program
{
    static void Main()
    {
        Console.Write("Enter the number of elements to print in the Fibonacci sequence: ");
        int terms = Convert.ToInt32(Console.ReadLine());

        FibonacciCalculator calculator = new FibonacciCalculator(terms);
        int[] sequence = calculator.CalculateSequence();
        Console.Write("Fibonacci Series: ");
        foreach (int num in sequence)
        {
            Console.Write(num + " ");
        }
        Console.WriteLine();

        var (maxValue, iterations) = calculator.GetStatistics();
        Console.WriteLine($"Max Value: {maxValue}");
        Console.WriteLine($"Total Iterations: {iterations}");

        Console.WriteLine("\nEnter the start value for the range: ");
        int start = Convert.ToInt32(Console.ReadLine());
        Console.WriteLine("Enter the finish value for the range: ");
        int end = Convert.ToInt32(Console.ReadLine());

        var (numbers, maxValues, iterationsArray) = FibonacciCalculator.CalculateRange(start, end);
        Console.WriteLine($"\nResults for the range [{start}, {end}]:");
        for (int i = 0; i < numbers.Length; i++)
        {
            Console.WriteLine($"Number: {numbers[i]}, Max Value: {maxValues[i]}, Iterations: {iterationsArray[i]}");
        }
    }
}
