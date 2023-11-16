# Name     Jan  Feb  Mar  Apr  May  Jun  Jul  Aug  Sep  Oct  Nov  Dec
# Dimple  1000  5000 2000 3000 1000 4000 5000 1000 4000 6000 7000 8000


# import pandas as pd
# import matplotlib.pyplot as plt

# df = pd.read_csv('data.csv', index_col='Name')


# # Extract the months and earnings data
# months = df.columns
# # earnings = df.loc['Dimple']
# earnings = df.loc[user_input]

# # Create the plot
# plt.plot(earnings, months, marker='o')

# # Add data labels
# for month, earning in zip(months, earnings):
#     plt.text(earning, month, str(earning))

# # Set the y-axis and x-axis labels
# plt.ylabel('Month')
# plt.xlabel('Amount')
# plt.title('Month-wise Earnings')

# # Display the plot
# plt.show()

# import sys
# import pandas as pd
# import matplotlib.pyplot as plt

# # Read the CSV file
# df = pd.read_csv('data.csv', index_col='Name')

# # Take user input from command-line arguments
# user_input = sys.argv[1]

# # Extract the months and earnings data
# months = df.columns
# earnings = df.loc[user_input]

# # Create the plot
# plt.plot(earnings, months, marker='o')

# # Add data labels
# for month, earning in zip(months, earnings):
#     plt.text(earning, month, str(earning))

# # Set the y-axis and x-axis labels
# plt.ylabel('Month')
# plt.xlabel('Amount')
# plt.title('Month-wise Earnings')

# # Save the plot as an image file
# chart_filename = 'income_chart.png'
# plt.savefig(chart_filename)

# # Return the filename of the generated chart back to the PHP script
# print(chart_filename)


# import sys
# import pandas as pd
# import matplotlib.pyplot as plt
# import seaborn as sns

# df = pd.read_csv('data.csv')

# user_input = sys.argv[1]

# # Filter the DataFrame based on the user input
# filtered_df = df[df['Name'] == user_input]

# # Extract the name, months, and earnings data
# name = filtered_df['Name'].iloc[0]
# months = filtered_df.columns[1:]
# earnings = filtered_df.iloc[0, 1:]

# # Set the Seaborn style
# sns.set(style="whitegrid")

# # Create the plot
# plt.plot(earnings, months, marker='o')

# # Add data labels
# for month, earning in zip(months, earnings):
#     plt.text(earning, month, str(earning))

# # Set the y-axis and x-axis labels
# plt.ylabel('Month')
# plt.xlabel('Amount')
# plt.title('Month-wise Earnings for ' + name)

# # Save the plot as an image file
# chart_filename = 'income_chart.png'
# plt.savefig(chart_filename)

# # Return the filename of the generated chart back to the PHP script
# print(chart_filename)



import pandas as pd
import matplotlib.pyplot as plt
import sys

df = pd.read_csv('data.csv')

# Take user input for the name
user_input = sys.argv[1]

# Filter the DataFrame based on the user input
filtered_df = df[df['Name'] == user_input]

# Check if the user input exists in the DataFrame
if not filtered_df.empty:
    name = filtered_df['Name'].iloc[0]
    months = df.columns[1:]
    earnings = filtered_df.iloc[0, 1:]

    # Set the bar width
    bar_width = 0.8

    # Create the plot
    plt.bar(months, earnings, width=bar_width, label=name)

    # Add data labels above each bar
    for i, earning in enumerate(earnings):
        plt.text(i, earning + 100, str(earning), ha='center')

    # Set the x-axis and y-axis labels
    plt.xlabel('Month')
    plt.ylabel('Amount')

    # Set the plot title
    plt.title('Month-wise Earnings for ' + name)

    # Save the plot as an image file
    chart_filename = 'income_chart.png'
    plt.savefig(chart_filename)

    # Print the filename of the generated chart
    print(chart_filename)
else:
    print("Invalid name. Please try again.")
