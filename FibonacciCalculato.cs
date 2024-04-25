using System;

public class FibonacciCalculator
{
    private int _numberOfTerms;

    public FibonacciCalculator(int numberOfTerms)
    {
        _numberOfTerms = numberOfTerms;
    }

    public int[] CalculateSequence()
    {
        if (_numberOfTerms < 1) return new int[0];

        int[] sequence = new int[_numberOfTerms];
        if (_numberOfTerms > 0) sequence[0] = 0; 
        if (_numberOfTerms > 1) sequence[1] = 1; 

        for (int i = 2; i < _numberOfTerms; i++)
        {
            sequence[i] = sequence[i - 1] + sequence[i - 2];
        }
        return sequence;
    }

    public (int max, int iterations) GetStatistics()
    {
        int[] sequence = CalculateSequence();
        return (sequence.Length > 1 ? sequence[^1] : 0, sequence.Length - 1);
    }

    public static (int[] numbers, int[] maxValues, int[] iterations) CalculateRange(int start, int end)
    {
        int rangeSize = end - start + 1;
        int[] numbers = new int[rangeSize];
        int[] maxValues = new int[rangeSize];
        int[] iterations = new int[rangeSize];

        for (int i = 0; i < rangeSize; i++)
        {
            int currentNumber = start + i;
            FibonacciCalculator calculator = new FibonacciCalculator(currentNumber);
            var stats = calculator.GetStatistics();
            numbers[i] = currentNumber;
            maxValues[i] = stats.max;
            iterations[i] = stats.iterations;
        }
        return (numbers, maxValues, iterations);
    }
}
